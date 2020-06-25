<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TourDetail;
use illuminate\Support\Str;
use File;

class TourController extends Controller
{
    public function showTour(){
        $tourDetails = TourDetail::paginate(10);
        // dd($tourDetails);
        return view('tour.tourGrid')->with('tourDetails', $tourDetails);
    }

    // public function addTour(){
    //     return view("tour.addTour");
    // }

    public function addTourPost(Request $request){
        $request->validate([
            'title' => 'max:190|required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',
            'price' => 'numeric|required',
            'days' => 'numeric|required',
            'where' => 'required|max:190',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]
    
        );
        // dd($request);
        $tourDetailsId=TourDetail::max('id');
        $tourDetails = new TourDetail;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($tourDetailsId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('contents/images/tour'), $imageName);
            $tourDetails->image = $imageName;
        }

        $tourDetails->title = $request->title;
        $tourDetails->where = $request->where;
        $tourDetails->days = $request->days;
        $tourDetails->price = $request->price;
        $tourDetails->available_from = $request->availableFrom;
        $tourDetails->available_to = $request->availableTo;
        $tourDetails->description = $request->description;
        $tourDetails->save();
        $request->session()->flash('successMessage', 'Tour Add Successfully!!!');
        return redirect()->action('TourController@manageTours');
    }

    public function editTourPost(Request $request){
        $request->validate([
            'title' => 'required|max:190',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'price' => 'numeric|required',
            'days' => 'numeric|required',
            'where' => 'required|max:190',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        // dd($request->all());
        $tourDetails = TourDetail::find($request->id);
        $tourDetailsId = $tourDetails->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/tour/".$tourDetails->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($tourDetailsId).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/tour'), $imageName);
            $tourDetails->image = $imageName;
        }

        $tourDetails->title = $request->title;
        $tourDetails->where = $request->where;
        $tourDetails->days = $request->days;
        $tourDetails->price = $request->price;
        $tourDetails->available_from = $request->availableFrom;
        $tourDetails->available_to = $request->availableTo;
        $tourDetails->description = $request->description;
        $tourDetails->save();
        $request->session()->flash('successMessage', 'Tour Updated Successfully');

        
        $details = TourDetail::find($request->id);
        return redirect()->action('TourController@manageTours');
    }

    public function deleteTour(Request $request){
        // dd($request->id);
        $details = TourDetail::find($request->id);
        $details->delete();
        // return($internationalPackageDetails);

        //delete image
        $image_path = "contents/images/tour/".$details->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }
        
        $items = TourDetail::paginate(10);
        return view('ajax.UpdatedTours')->with('items', $items);
        // return redirect()->action('PackageController@manageInternationalPackages');
    }

    public function tourDetails($id){
        $details = TourDetail::where(['id' => $id])->first();
        return view("tour.details")->with('details', $details);
    }

    public function manageTours(){
        $items = TourDetail::get();
        return view("tour.manage")->with('items', $items);
    }

    public function editTour($id){
        $details = TourDetail::find($id);
        return view('tour.edit')->with('details', $details);
    }
}
