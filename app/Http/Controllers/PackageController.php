<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DomesticPackageDetail;
use App\InternationalPackageDetail;
use Str;
use File;

class PackageController extends Controller
{
    public function domesticPackage(){
        $domesticPackageDetails = DomesticPackageDetail::paginate(0);
        // dd($domesticPackageDetails);
        return view('package.domesticPackage')->with('domesticPackageDetails', $domesticPackageDetails);
    }

    public function domesticPackageDetails($id){
        $details = DomesticPackageDetail::find($id);
        // dd($details);
        if($details == null)
        {
            return "<center><h2>No Packages found</h2></center>";
        }
        return view('package.domesticPackageDetails')->with('details', $details);
    }

    public function internationalPackageDetails($id){
        $details = InternationalPackageDetail::find($id);
        // dd($domesticPackageDetails);
        if($details == null)
        {
            return "<center><h2>No Packages found</h2></center>";
        }
        return view('package.internationalPackageDetails')->with('details', $details);
    }

    public function internationalPackage(){
        $internationalPackageDetails = internationalPackageDetail::paginate(10);
        // dd($domesticPackageDetails);
        return view('package.internationalPackage')->with('internationalPackageDetails', $internationalPackageDetails);
    }
    

    public function manageDomesticPackages(){
        $domesticPackageDetails = DomesticPackageDetail::paginate(10);
        return view('package.manageDomesticPackages')->with('domesticPackageDetails', $domesticPackageDetails);
    }
    
    public function editDomesticPackage($id){
        $details = DomesticPackageDetail::find($id);
        return view('package.editDomesticPackage')->with('details', $details);
    }

    public function addDomesticPackagePost(Request $request){
        $request->validate([
            'title' => 'required|max:190',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',
            'price' => 'numeric|required',
            'days' => 'numeric|required',
            'where' => 'required|max:190',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        $domesticPackageDetailsId = DomesticPackageDetail::max('id');
        $domesticPackageDetails = new DomesticPackageDetail;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($domesticPackageDetailsId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/packages/domestic'), $imageName);
            $domesticPackageDetails->image = $imageName;
        }

        $domesticPackageDetails->title = $request->title;
        $domesticPackageDetails->where = $request->where;
        $domesticPackageDetails->days = $request->days;
        $domesticPackageDetails->price = $request->price;
        $domesticPackageDetails->available_from = $request->availableFrom;
        $domesticPackageDetails->available_to = $request->availableTo;
        $domesticPackageDetails->description = $request->description;
        $domesticPackageDetails->save();
        $request->session()->flash('successMessage', 'Package Added Successfully');

        return redirect()->action('PackageController@manageDomesticPackages');
    }
    

    public function editDomesticPackagePost(Request $request){
        // dd('sfsdf');
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
        $domesticPackageDetails = DomesticPackageDetail::find($request->id);
        $domesticPackageDetailsId = $domesticPackageDetails->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/packages/domestic/".$domesticPackageDetails->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($domesticPackageDetailsId).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/packages/domestic'), $imageName);
            $domesticPackageDetails->image = $imageName;
        }

        $domesticPackageDetails->title = $request->title;
        $domesticPackageDetails->where = $request->where;
        $domesticPackageDetails->days = $request->days;
        $domesticPackageDetails->price = $request->price;
        $domesticPackageDetails->available_from = $request->availableFrom;
        $domesticPackageDetails->available_to = $request->availableTo;
        $domesticPackageDetails->description = $request->description;
        $domesticPackageDetails->save();
        $request->session()->flash('successMessage', 'Package Updated Successfully');

        
        $details = DomesticPackageDetail::find($request->id);
        return redirect()->action('PackageController@manageDomesticPackages');
    }

    public function deleteDomesticPackage(Request $request){
        // dd($request->id);
        $item = DomesticPackageDetail::find($request->id);
        $item->delete();

        //delete image
        $image_path = "contents/images/packages/domestic/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $domesticPackageDetails = DomesticPackageDetail::paginate(10);
        // return($internationalPackageDetails);
        return view('ajax.UpdatedDomesticPackages')->with('domesticPackageDetails', $domesticPackageDetails);
        // return redirect()->action('PackageController@manageInternationalPackages');
    }

    public function manageInternationalPackages(){
        $internationalPackageDetails = InternationalPackageDetail::paginate(10);
        return view('package.manageInternationalPackages')->with('internationalPackageDetails', $internationalPackageDetails);
    }
    
    public function editInternationalPackage($id){
        $details = InternationalPackageDetail::find($id);
        return view('package.editInternationalPackage')->with('details', $details);
    }

    public function addInternationalPackagePost(Request $request){
        $request->validate([
            'title' => 'required|max:190',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',
            'price' => 'numeric|required',
            'days' => 'numeric|required',
            'where' => 'required|max:190',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        $internationalPackageDetailsId = InternationalPackageDetail::max('id');
        $internationalPackageDetails = new InternationalPackageDetail;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($internationalPackageDetailsId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/packages/international'), $imageName);
            $internationalPackageDetails->image = $imageName;
        }

        $internationalPackageDetails->title = $request->title;
        $internationalPackageDetails->where = $request->where;
        $internationalPackageDetails->days = $request->days;
        $internationalPackageDetails->price = $request->price;
        $internationalPackageDetails->available_from = $request->availableFrom;
        $internationalPackageDetails->available_to = $request->availableTo;
        $internationalPackageDetails->description = $request->description;
        $internationalPackageDetails->save();
        $request->session()->flash('successMessage', 'Package Added Successfully');

        return redirect()->action('PackageController@manageInternationalPackages');
    }
    
    public function editInternationalPackagePost(Request $request){
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
        $internationalPackageDetails = InternationalPackageDetail::find($request->id);
        $internationalPackageDetailsId = $internationalPackageDetails->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/packages/international/".$internationalPackageDetails->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($internationalPackageDetailsId).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/packages/international'), $imageName);
            $internationalPackageDetails->image = $imageName;
        }

        $internationalPackageDetails->title = $request->title;
        $internationalPackageDetails->where = $request->where;
        $internationalPackageDetails->days = $request->days;
        $internationalPackageDetails->price = $request->price;
        $internationalPackageDetails->available_from = $request->availableFrom;
        $internationalPackageDetails->available_to = $request->availableTo;
        $internationalPackageDetails->description = $request->description;
        $internationalPackageDetails->save();
        $request->session()->flash('successMessage', 'Package Updated Successfully');

        
        $details = InternationalPackageDetail::find($request->id);
        return redirect()->action('PackageController@manageInternationalPackages');
    }

    public function deleteInternationalPackage(Request $request){
        // dd($request->id);
        $item = InternationalPackageDetail::find($request->id);

        $item->delete();

        //delete image
        $image_path = "contents/images/packages/international/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $internationalPackageDetails = InternationalPackageDetail::paginate(10);
        // return($internationalPackageDetails);
        return view('ajax.UpdatedInternationalPackages')->with('internationalPackageDetails', $internationalPackageDetails);
        // return redirect()->action('PackageController@manageInternationalPackages');
    }
    
    
    
}
