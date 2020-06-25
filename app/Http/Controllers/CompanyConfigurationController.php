<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CompanyConfiguration;
use File;
// use File;
// use Image; //Intervention Image



class CompanyConfigurationController extends Controller
{
    public function showCompanyConfigurationForm(){
        $informations = CompanyConfiguration::first();
        // dd($informations);
        return view('companyConfiguration')->with('informations', $informations);
    }

    public function companyConfigurationPost(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:190',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'address' => 'required|max:190',
            'phoneNumber1' => 'required|max:190',
            'phoneNumber2' => 'max:190',
            'email'=>'required|max:190|email',
            'googleMap' => 'max:390',
            'shortAboutUs' => 'required|max:320',
            'aboutUs' => 'required',
        ],
        [
            // 'phoneForMess.size' => 'The contact number has to be 11 character long',
            // 'phoneForMess.required' => 'The Contact number is required.',
            // 'phoneForMess.regex' => 'The Contact number is invalid.',
            // 'rentForMess.numeric' => 'The rent must be number'
        ]);

        // dd($request->logo->getClientOriginalExtension());
        // dd($request->name);
        // $userName = Auth::user()->name;

        $informations = CompanyConfiguration::first();

        if ($request->hasFile('logo')) {
            //delete previous image
            $image_path = "contents/images/companyLogo/".$informations->logo;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }

            $imageName = "companyLogo".'.'.$request->logo->getClientOriginalExtension();
            // dd($imageName);
            $request->logo->move(public_path('contents/images/companyLogo'), $imageName);
            $informations->logo = $imageName;
        }

        // dd($informations);
        $informations->company_name = $request->name;
        $informations->address = $request->address;
        $informations->phone_number1 = $request->phoneNumber1;
        $informations->phone_number2 = $request->phoneNumber2;
        $informations->email = $request->email;
        $informations->facebook = $request->facebook;
        $informations->google_map = $request->googleMap;
        $informations->about_us = $request->aboutUs;
        $informations->short_about_us = $request->shortAboutUs;

        $informations->save();

        $request->session()->flash('successMessage', 'Information changed successfully!');

        return redirect()->route('companyConfiguration');
    }

    public function manageAboutUs(){
        return view('Admin.aboutUs');
    }

    public function fetchCompanyConfiguration(){
        return CompanyConfiguration::first();
    }
    
}
