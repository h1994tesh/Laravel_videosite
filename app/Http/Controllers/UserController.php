<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    public function getRegister() {
        return view('front.register');
    }

    public function getLogin() {
        return view('front.login');
    }

    public function postSignUp(Request $request) {



        $messages = [
            'name.required' => 'Please enter Your Name.',
            'email.required' => 'Please enter Your Email.',
            'email.email' => 'Enter Valid Email address.',
            'email.unique' => 'Duplicate Email Address.',
            'password.required' => 'Please enter Your Password.',
            'password.confirmed' => 'Your Password missmatch.',
            'password.min' => 'Password should be minimum 6 character.',
            'gender.required' => 'Choose Your gender.',
            'cnt.required' => 'Choose Your Country.',
        ];

        $v = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users,r_email',
                    'password' => 'required|min:6|confirmed',
                    'gender' => 'required',
                    'cnt' => 'required',
                        ], $messages);
        if ($v->fails()) {
            return redirect('/users/register')
                            ->withErrors($v)
                            ->withInput();
        }


        $name = $request["name"];
        $email = $request["email"];
        $password = bcrypt($request["password"]);
        $password_confirmation = $request["password_confirmation"];
        $gender = $request["gender"];

        $cnt = $request["cnt"];

        if ($gender == "m") {
            $g = 1;
        } else {
            $g = 2;
        }

        $user = new User();

        $user->r_name = $name;
        $user->r_email = $email;
        $user->r_password = $password;
        $user->r_gender = $g;
        $user->r_country = $cnt;

        $user->save();

        Auth::login($user);

        return redirect('home');
    }

    public function postSignIn(Request $request) {

        $messages = [
            'email.required' => 'Please enter Your Email.',
            'email.email' => 'Enter Valid Email address.',
            'password.required' => 'Please enter Your Password.',
            'password.min' => 'Password should be minimum 6 character.',
        ];

        $v = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6',
                        ], $messages);
        if ($v->fails()) {
            return redirect('/users/login')
                            ->withErrors($v)
                            ->withInput();
        }
        if (Auth::attempt(['r_email' => $request["email"], 'password' => $request["password"]])) {
            return redirect('home');
        }
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect('home');
    }

}
