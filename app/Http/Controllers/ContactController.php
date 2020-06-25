<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactList;
use App\CompanyConfiguration;
use App\Jobs\SendEmailJob;
use App\Mail\ContactUs;

class ContactController extends Controller
{
    public function contactUs()
    {
        $companyConfiguration = CompanyConfiguration::first();        
        return view('contactUs')->with('companyConfiguration', $companyConfiguration);
    }

    public function contactPost(Request $request)
    {
        // dd($request->message);
        $data = [
            'name'=> $request->name,
            'message'=> $request->message,
            'email'=> $request->email,
        ];
        $job = (new SendEmailJob('robiullah2244@gmail.com', new ContactUs($data)));
        dispatch($job);

        // dd($request);
        // $contactList = new ContactList;
        // $contactList->name = $request->name;
        // $contactList->email = $request->email;
        // $contactList->message = $request->message;
        // $contactList->save();
        $request->session()->flash('successMessage', 'Message Send Successfully');
        return redirect()->action('ContactController@contactUs');
        // $companyConfiguration = CompanyConfiguration::first();        
        // return view('contactUs')->with('companyConfiguration', $companyConfiguration);
    }

    public function showContactList()
    {
        // dd($request);
        $contactList = ContactList::get();
       // dd($contactList);
        return view('showContactList')->with('contactList', $contactList);
    }

    public function removeContact(Request $request)
    {
        $id = $request->id;
        ContactList::find($id)->delete();
        return redirect()->action('ContactController@showContactList');
    }
}
