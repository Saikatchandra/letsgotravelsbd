<?php

namespace App\Http\Controllers;

use App\Hajj;
use App\Umrah;
use App\Blog;
use Str;
use File;
use Illuminate\Http\Request;

class HajjAndUmrahController extends Controller
{
    public function hajjHome(){
        $hajj = Hajj::get()->first();
        $blog = Blog::get()->last();
        return view('hajjAndUmrah.hajjHome',compact('hajj','blog'));
    }

    public function umrahHome(){
        $umrah = Umrah::get()->first();
        $blog = Blog::get()->last();
        return view('hajjAndUmrah.umrahHome',compact('umrah','blog'));
    }

     public function manageHajj(){
        $hajjDetails = Hajj::paginate(10);
        return view('hajjAndUmrah.manageHajj')->with('hajjDetails', $hajjDetails);
    }
     public function manageUmrah(){
        $umrahDetails = Umrah::paginate(10);
        return view('hajjAndUmrah.manageUmrah')->with('umrahDetails', $umrahDetails);
    }

     public function addHajjpost(Request $request){
       // dd ($request->all());
        $request->validate([
            'title' => 'required|max:190',
            'desc'  =>  'required|max:2000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',
           ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        $hajjDetailsId = Hajj::max('id');
        $hajjDetails = new Hajj;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($hajjDetailsId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/hajj&umrah/hajj'), $imageName);
            $hajjDetails->image = $imageName;
        }

        $hajjDetails->title = $request->title;
        $hajjDetails->desc = $request->desc;
        $hajjDetails->save();
        $request->session()->flash('successMessage', 'Hajj Added Successfully');
       
        return redirect()->action('HajjAndUmrahController@manageHajj');

    }
     public function addUmrahpost(Request $request){
       // dd ($request->all());
        $request->validate([
            'title' => 'required|max:190',
            'desc'  =>  'required|max:2000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',
           ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        $umrahDetailsId = Umrah::max('id');
        $umrahDetails = new Umrah;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($umrahDetailsId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/hajj&umrah/umrah'), $imageName);
            $umrahDetails->image = $imageName;
        }

        $umrahDetails->title = $request->title;
        $umrahDetails->desc = $request->desc;
        $umrahDetails->save();
        $request->session()->flash('successMessage', 'Umrah Added Successfully');
       
        return redirect()->action('HajjAndUmrahController@manageUmrah');

    }


    public function editHajj($id){
        $details = Hajj::find($id);
        return view('hajjAndUmrah.editHajj')->with('details', $details);
    }
     public function editUmrah($id){
        $details = Umrah::find($id);
        return view('hajjAndUmrah.editUmrah')->with('details', $details);
    }

    public function editHajjPost(Request $request){
        // dd('sfsdf');
        $request->validate([
            'title' => 'required|max:190',
             'desc'  =>  'required|max:2000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
             ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        // dd($request->all());
        $hajjDetails = Hajj::find($request->id);
        $hajjDetailsId = $hajjDetails->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/hajj&umrah/hajj/".$hajjDetails->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($hajjDetailsId).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/hajj&umrah/hajj'), $imageName);
            $hajjDetails->image = $imageName;
        }

        $hajjDetails->title = $request->title;
        $hajjDetails->desc = $request->desc;
        $hajjDetails->save();
        $request->session()->flash('successMessage', 'Hajj Updated Successfully');

        
        $details = Hajj::find($request->id);
        return redirect()->action('HajjAndUmrahController@manageHajj');
    }

     public function editUmrahPost(Request $request){
        //return $request->all();
        $request->validate([
            'title' => 'required|max:190',
             'desc'  =>  'required|max:2000',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
             ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        // dd($request->all());
        $umrahDetails = Umrah::find($request->id);
        $umrahDetailsId = $umrahDetails->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/hajj&umrah/umrah/".$umrahDetails->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($umrahDetailsId).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/hajj&umrah/umrah'), $imageName);
            $umrahDetails->image = $imageName;
        }

        $umrahDetails->title = $request->title;
        $umrahDetails->desc = $request->desc;
        $umrahDetails->save();
        $request->session()->flash('successMessage', 'Umrah Updated Successfully');

        
        $details = Umrah::find($request->id);
        return redirect()->action('HajjAndUmrahController@manageUmrah');
    }

    public function deleteHajj(Request $request){
        // dd($request->id);
        $item = Hajj::find($request->id);
        $item->delete();

        //delete image
        $image_path = "contents/images/hajj&umrah/hajj/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $hajjDetails = Hajj::paginate(10);
         // return redirect()->action('HajjAndUmrahController@manageHajj');
        // return($internationalPackageDetails);
        return view('ajax.UpdatedHajj')->with('hajjDetails', $hajjDetails);
        // return redirect()->action('PackageController@manageInternationalPackages');
    }

     public function deleteUmrah(Request $request){
        // dd($request->id);
        $item = Umrah::find($request->id);
        $item->delete();

        //delete image
        $image_path = "contents/images/hajj&umrah/umrah/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $umrahDetails = Umrah::paginate(10);
         // return redirect()->action('HajjAndUmrahController@manageHajj');
        // return($internationalPackageDetails);
        return view('ajax.UpdatedUmrah')->with('umrahDetails', $umrahDetails);
        // return redirect()->action('PackageController@manageInternationalPackages');
    }
    
}
