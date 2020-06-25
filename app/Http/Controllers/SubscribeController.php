<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubscriptionDivision;
use App\subscribe;

class SubscribeController extends Controller
{
    public function subscriptionDivision()
    {
        $item = SubscriptionDivision::first();
        return view('subscriptionDivision')->with('item', $item);
    }

    public function subscriptionDivisionPost(Request $request)
    {
        $request->validate([
            'text' => 'required|max:150',

        ]);
        $item = SubscriptionDivision::find($request->id);
        $item->text = $request->text;
        $item->save();
        return view('subscriptionDivision')->with('item', $item);
    }
    
    public function fetchSubscriptionDivision()
    {
        return SubscriptionDivision::first();
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|max:100|email',
        ]);
        $item = new subscribe();
        $item->email = $request->email;
        $item->save();
        return redirect()->back();
    }

    public function showSubscribedUser()
    {
        $items = subscribe::get();
        return view('showSubscribedUser')->with('items', $items);
    }

    public function deleteSubscription(Request $request)
    {
        subscribe::find($request->id)->delete();
        return redirect()->action('SubscribeController@showSubscribedUser');
    }

}
