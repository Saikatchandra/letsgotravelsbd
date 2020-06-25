<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;
use App\CompanyConfiguration;
use DateTime;
use Str;
use File;

class AboutUsController extends Controller
{

    public function aboutUs()
    {
        $companyConfiguration = CompanyConfiguration::select('about_us')->first();
        $aboutUsSection1 = AboutUs::find(1);
        
        return view('aboutUs')->with('companyConfiguration', $companyConfiguration)->with('aboutUsSection1', $aboutUsSection1);
    }

    public function aboutUsSection1()
    {
        $item = AboutUs::find(1);
        //dd($item);
        return view('aboutUs.aboutUsSection1')->with('item', $item);
    }

    public function aboutUsSection1Post(Request $request)
    {
        $request->validate([
            'title'=> 'max:20|required',
            'aboutUs'=> 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ],
        [
            'image.*.image' => 'Must be an Image',
            'image.*.mimes' => 'Must be an Image with extension jpeg,png,jpg,gif,svg only',
            'image.*.max' => 'Must be an Image with max size 10240KB',
        ]);

   
        $item = AboutUs::find(1);
     
        if($request->hasFile('image'))
        {
            $oldImages = explode('|', $item->images);
            foreach($oldImages as $oldImage)
            {
                // delete image
                $image_path = "contents/images/aboutUs/aboutUsSection1/".$oldImage;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    // dd($image_path);
                    File::delete($image_path);
                }
            }
            

            $allImageName = '';
            foreach($request->image as $image)
            {
                $now = new DateTime();
                $strNow = $now->format('Y-m-d H-i-s');
                $imageName = Str::random(16).'_'.(string)$strNow.'.'.$image->getClientOriginalExtension();
                // dd($imageName);
                $image->move(public_path('contents/images/aboutUs/aboutUsSection1'), $imageName);
                $allImageName = $allImageName.'|'.$imageName;
            }

            $allImageName = ltrim($allImageName, '|');

            

            // dd($allImageName);
            $item->images = $allImageName;
        }
      
        $item->title = $request->title;
        $item->about_us = $request->aboutUs;
        $item->save();
        return redirect()->action('AboutUsController@aboutUsSection1');
    }

    public function aboutUsSection2()
    {
        $item = AboutUs::find(2);
      //  dd($item);
        return view('aboutUs.aboutUsSection2')->with('item', $item);
    }

    public function aboutUsSection2Post(Request $request)
    {
        $request->validate([
            'title'=> 'max:20|required',
            'aboutUs'=> 'required|max:1000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
            // dd($request->image);
        $item = AboutUs::find(2);
        if($request->hasFile('image'))
        {
            // delete image
            $image_path = "contents/images/aboutUs/aboutUsSection2/".$item->images;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            
            $imageName = Str::random(16).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('contents/images/aboutUs/aboutUsSection2'), $imageName);

            $item->images = $imageName;
        }

        $item->title = $request->title;
        $item->about_us = $request->aboutUs;
        $item->save();
        return redirect()->action('AboutUsController@aboutUsSection2');
    }

}
