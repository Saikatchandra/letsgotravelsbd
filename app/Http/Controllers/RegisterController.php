<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view("auth.register");
    }

    public function registerNewMemberPost(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:80',
            'email' => 'required|string|email|max:190|unique:users',
            'password' => 'required|string|min:8|confirmed|max:80',
            // 'passwordConfirmation' => 'same:password',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->action('HomeController@index');


        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }
       
}
