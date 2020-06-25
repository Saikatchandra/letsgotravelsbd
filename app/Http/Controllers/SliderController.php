<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use illuminate\Support\Str;
use File;

class SliderController extends Controller
{
    public function manageSlider(){

        $slider = Slider::get();
        // dd($slider[1]->image);
        return view('slider.manageSlider')->with('slider', $slider);
    }

    public function addPhotosToSlider(Request $request){
        
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',
            'title1' => 'required|max:30',
            'title2' => 'required|max:30',

        ],
        [
            'image.*.image' => 'Must be an Image',
            'image.*.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.*.max' => 'Must be an Image with max sixe 10240KB',
        ]
    
        );
        // dd($request->image);
        if($request->hasFile('image'))
        {
            foreach($request->image as $image)
            {
                $slider = new Slider;
                $slider->title1 = $request->title1;
                $slider->title2 = $request->title2;
                $sliderMaxId = slider::max('id');

                $imageName = Str::random(16).'_'.($sliderMaxId+1).'.'.$image->getClientOriginalExtension();
                // dd($imageName);
                $imageDir = 'contents/images/slider/';
                $image->move($imageDir, $imageName);
                $imageUrl = $imageName;
                $slider->image = $imageUrl;
                $slider->save();
            }
            
        }
        return redirect('/manage-slider');
        
    }

    public function removePhotoFromSlider(Request $request)
    {
        // dd($request->id);
        $item = Slider::find($request->id);
        $item->delete();

        //delete image
        $image_path = "contents/images/slider/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $slider = Slider::get();
        // dd($slider);
        return view('ajax.updatedSliderPhotos')->with('slider', $slider);
        // return($request->id);
        // return redirect()->action('ContactController@showContactList');
    
    }

    public function editSlider($id)
    {
        $item = Slider::find($id);
        return view('slider.editSlider')->with('item', $item);
    }

    public function editSliderPost(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'title1' => 'required|max:30',
            'title2' => 'required|max:30',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);

        // dd($request->all());
        $item = Slider::find($request->id);
        // dd($item);
        $itemId = $item->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/slider/".$item->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($itemId).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/slider'), $imageName);
            $item->image = $imageName;
        }

        $item->title1 = $request->title1;
        $item->title2 = $request->title2;

        $item->save();
        $slider = Slider::get();
        return redirect()->action('SliderController@manageSlider');
    
    }
}
