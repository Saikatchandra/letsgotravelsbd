<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoGallery;
use illuminate\Support\Str;
use File;

class PhotoGalleryController extends Controller
{
    public function managePhotoGallery(){
        $photoGallery = PhotoGallery::get();
        return view('managePhotoGallery')->with('photoGallery', $photoGallery);
    }

    public function addPhotosToGallery(Request $request){
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ],
        [
            'image.*.image' => 'Must be an Image',
            'image.*.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.*.max' => 'Must be an Image with max sixe 10240KB',
        ]
        );

        if($request->hasFile('image'))
        {
            foreach($request->image as $image)
            {
                $photoGallery = new PhotoGallery;
                $photoGalleryMaxId = PhotoGallery::max('id');
    
                $imageName = Str::random(16).'_'.($photoGalleryMaxId+1).'.'.$image->getClientOriginalExtension();
                // dd($imageName);
                $image->move(public_path('contents/images/photoGallery'), $imageName);
                $photoGallery->image = $imageName;
                $photoGallery->save();
            }
        }
        return redirect()->action('PhotoGalleryController@managePhotoGallery');
    }

    public function removePhotoFromPhotoGallery(Request $request){
        // return($request->id);
        $item = PhotoGallery::find($request->id);
        $item->delete();

        //delete image
        $image_path = "contents/images/photoGallery/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }
        $photoGallery = PhotoGallery::get();
        return view('ajax.updatedPhotoGallery')->with('photoGallery', $photoGallery);
        // return($request->id);
        // return redirect()->action('ContactController@showContactList');
    }

    public function gallery()
    {
        $photoGallery = PhotoGallery::get();
        return view('gallery')->with('photoGallery', $photoGallery);
    }

}
