<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/register', function(){
//     // return redirect()->action('HomeController@welcome');
//     return 'sdfsdf';
// });


Route::group(['middleware'=>'auth'],function(){

    ////Admin////
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/company-Configuration', 'CompanyConfigurationController@showCompanyConfigurationForm')->name('companyConfiguration');
    Route::post('/companyConfigurationPost', 'CompanyConfigurationController@companyConfigurationPost');

    //// Admin About US ////
    Route::get('/about-us-section-1', 'AboutUsController@aboutUsSection1')->name('aboutUsSection1');
    Route::post('/aboutUsSection1Post', 'AboutUsController@aboutUsSection1Post');
    Route::get('/about-us-section-2', 'AboutUsController@aboutUsSection2')->name('aboutUsSection2');
    Route::post('/aboutUsSection2Post', 'AboutUsController@aboutUsSection2Post');
    // Route::get('/about-us-section-3', 'AboutUsController@aboutUsSection3')->name('aboutUsSection3');

    
    
    ////Admin Slider////
    Route::get('/manage-slider', 'SliderController@manageSlider')->name('manageSlider');
    Route::get('/edit/slider/{id}', 'SliderController@editSlider')->name('editSlider');
    Route::post('/manage-slider', 'SliderController@addPhotosToSlider');
    Route::post('removePhotoFromSlider', 'SliderController@removePhotoFromSlider');
    Route::post('editSliderPost', 'SliderController@editSliderPost');

    
    
    ////Admin Gallery////
    Route::get('/manage-photo-gallery', 'PhotoGalleryController@managePhotoGallery')->name('managePhotoGallery');
    Route::post('/addPhotosToGallery', 'PhotoGalleryController@addPhotosToGallery');
    Route::post('/removePhotoFromPhotoGallery', 'PhotoGalleryController@removePhotoFromPhotoGallery');

    //////// Admin Tour ////////
    Route::get('/addTour', 'TourController@addTour')->name('addTour');
    Route::get('/manage-tours', 'TourController@manageTours')->name('manageTours');
    Route::post('/addTourPost', 'TourController@addTourPost');
    Route::get('/edit/tour/{id}', 'TourController@editTour')->name('editTour');
    Route::post('/editTourPost', 'TourController@editTourPost');
    Route::post('/deleteTour', 'TourController@deleteTour');

    ///Admin Domestic Packages///
    Route::get('/manage/packages/domestic', 'PackageController@manageDomesticPackages')->name('manageDomesticPackages');
    Route::post('/addDomesticPackagePost', 'PackageController@addDomesticPackagePost');
    Route::get('/edit/package/domestic/{id}', 'PackageController@editDomesticPackage')->name('editDomesticPackage');
    Route::post('/editDomesticPackagePost', 'PackageController@editDomesticPackagePost')->name('editDomesticPackagePost');
    Route::post('/deleteDomesticPackage', 'PackageController@deleteDomesticPackage')->name('deleteDomesticPackage');

   
    ///Admin hajj ///
   Route::get('/hajj&umrah/hajj', 'HajjAndUmrahController@manageHajj')->name('manageHajj');
    Route::post('/addHajj', 'HajjAndUmrahController@addHajjpost');
    Route::get('/edit/hajj&umrah/hajj/{id}', 'HajjAndUmrahController@editHajj')->name('editHajj');
    Route::post('/editHajjPost', 'HajjAndUmrahController@editHajjPost')->name('editHajjPost');
    Route::post('/deleteHajj', 'HajjAndUmrahController@deleteHajj')->name('deleteHajj');

    ///Admin Umrah ///
     Route::get('/hajj&umrah/umrah', 'HajjAndUmrahController@manageUmrah')->name('manageUmrah');
    Route::post('/addUmrah', 'HajjAndUmrahController@addUmrahpost');
    Route::get('/edit/hajj&umrah/umrah/{id}', 'HajjAndUmrahController@editUmrah')->name('editUmrah');
    Route::post('/editUmrahPost', 'HajjAndUmrahController@editUmrahPost')->name('editUmrahPost');
    Route::post('/deleteUmrah', 'HajjAndUmrahController@deleteUmrah')->name('deleteUmrah');
   


    /// Admin International Packages ///
    Route::get('/manage/packages/international', 'PackageController@manageInternationalPackages')->name('manageInternationalPackages');
    Route::post('/addInternationalPackagePost', 'PackageController@addInternationalPackagePost');
    Route::get('/edit/package/international/{id}', 'PackageController@editInternationalPackage')->name('editInternationalPackage');
    Route::post('/editInternationalPackagePost', 'PackageController@editInternationalPackagePost')->name('editInternationalPackagePost');
    Route::post('/deleteInternationalPackage', 'PackageController@deleteInternationalPackage')->name('deleteInternationalPackage');

    //////////ADMIN////////////
    Route::get('/contact-list', 'ContactController@showContactList')->name('showContactList');
    Route::post('/removeContact', 'ContactController@removeContact');
    Route::get('/registerNewMember', 'RegisterController@showRegistrationForm')->name('registerNewMember');
    Route::POST('/registerNewMemberPost', 'RegisterController@registerNewMemberPost');

    //////Admin slug//////
    Route::get('/show-all-pages', 'PageController@showAllPages')->name('showAllPages');
    Route::get('/create-page', 'PageController@createPage')->name('createPage');
    Route::post('/createPagePost', 'PageController@createPagePost');
    Route::get('/edit/page/{id}', 'PageController@editPage')->name('editPage');
    Route::post('/editPagePost', 'PageController@editPagePost');
    Route::post('/deletePage', 'PageController@deletePage');

    //// Manage Blog ////
    Route::get('/show-all-post', 'BlogController@showAllPost')->name('showAllPost');
    Route::get('/add-post', 'BlogController@addPost')->name('addPost');
    Route::post('/addPostPost', 'BlogController@addPostPost');
    Route::get('/edit/post/{id}', 'BlogController@editPost')->name('editPost');
    Route::post('/editPostPost', 'BlogController@editPostPost');
    Route::post('/deletePost', 'BlogController@deletePost');

    Route::get('/subscriptionDivision', 'SubscribeController@subscriptionDivision')->name('subscriptionDivision');
    Route::post('/subscriptionDivisionPost', 'SubscribeController@subscriptionDivisionPost');
    Route::get('/show-subscribed-user', 'SubscribeController@showSubscribedUser')->name('showSubscribedUser');
    Route::post('/deleteSubscription', 'SubscribeController@deleteSubscription');

    //NEWS & UPDATES
    Route::resource('newsAndUpdate','NewsAndUpdateController');


});

////User////
Route::get('/', 'HomeController@welcome')->name('welcome');

////User About Us ////
Route::get('/about-us', 'AboutUsCOntroller@aboutUs')->name('aboutUs');
Route::get('/contact-us', 'ContactController@contactUs')->name('contactUs');
Route::post('/contactPost', 'ContactController@contactPost');

// Route::get('/about-us/{section}', 'AboutUsCOntroller@aboutUsBySection')->name('aboutUsBySection');

Auth::routes();

////User Galley////
Route::get('/gallery', 'PhotoGalleryController@gallery')->name('gallery');

//////// User Tour ////////
Route::get('/tour', 'TourController@showTour')->name('showTour');
Route::get('/tour-details/{id}', 'TourController@tourDetails')->name('tourDetails');
Route::get('/search-tour', 'TourController@searchTour')->name('searchTour');

///// User Air Ticket /////
Route::get('air-ticket', 'AirTicketController@airTicketHome')->name('airTicketHome');
Route::get('search-air-ticket', 'AirTicketController@searchAirTicket')->name('searchAirTicket');

//// User Hajj and Umrah////
Route::get('hajj', 'HajjAndUmrahController@hajjHome')->name('hajjHome');
Route::get('umrah', 'HajjAndUmrahController@umrahHome')->name('umrahHome');

///User Domestic Packages///
Route::get('/package/domestic', 'PackageController@domesticPackage')->name('domesticPackage');
Route::get('/package/domestic/{id}', 'PackageController@domesticPackageDetails')->name('domesticPackageDetails');

///User International Packages///
Route::get('/package/international', 'PackageController@internationalPackage')->name('internationalPackage');
Route::get('/package/international/{id}', 'PackageController@internationalPackageDetails')->name('internationalPackageDetails');

////user fetch(Ajax)////
Route::get('/fetchSlug', 'PageController@fetchSlug')->name('fetchSlug');
Route::get('/fetchCompanyConfiguration', 'CompanyConfigurationController@fetchCompanyConfiguration')->name('fetchCompanyConfiguration');
Route::get('fetchSubscriptionDivision', 'SubscribeController@fetchSubscriptionDivision')->name('fetchSubscriptionDivision');

/// SUBSCRIBE /////
Route::get('subscribe', 'SubscribeController@subscribe');

//// User Blog ////
Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blog/post/{id}', 'BlogController@blogPostDetails')->name('blogPostDetails');

//// User Slug ////
Route::get('/{slug}', 'PageController@hitCustomPage');

/// News & update  ///
Route::get('/newsAndUpdate/post/{id}', 'NewsAndUpdateController@newsUpdatePostDetails')->name('newsUpdatePostDetails');

