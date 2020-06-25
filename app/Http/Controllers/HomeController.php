<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\PhotoGallery;
use App\TourDetail;
use App\CompanyConfiguration;
use App\AboutUs;
use App\Blog;
use App\NewsAndUpdate;
use App\Hajj;
use App\Umrah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {


        $slider = Slider::get();
        $photoGallery = PhotoGallery::get();
        $tourDetails = TourDetail::paginate(10);
        $aboutUsSection1 = AboutUs::find(1);
        $aboutUsSection2 = AboutUs::find(2);
        $blogs = Blog::get();
        $newsAndUpdates = NewsAndUpdate::get();
        $companyconfig = CompanyConfiguration::get();
        // $hajj = Hajj::get();
    
        // $umrah = Umrah::find(1);

        // $aboutUsSection1Words = explode(' ', $aboutUsSection1);
        // dd($aboutUsSection1Words);
        // $oneThirdLength = $aboutUsSection1Words.length;
        // dd($oneThirdLength);
        
        return view('welcome', compact('slider', 'photoGallery', 'tourDetails', 'aboutUsSection1', 'aboutUsSection2', 'blogs', 'newsAndUpdates','companyconfig'));
    }

}
