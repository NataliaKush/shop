<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $user = Users::where('email', $request->post('email'))->first();

        if ($user !== null && Hash::check($request->post('password'), $user->password) === true) {
            Auth::login($user);

            return view('index');
        } else {
            return view('login');
        }
    }

    public function getSignup() {
        return view('signup');
    }

    public function postSignup(Request $request) {
        $user = Users::where('email', $request->post('email'))->first();

        if ($user !== null) {
            echo 'email already exist';

            exit;
        }

        if ($request->post('password1') === $request->post('password2')) {
            $user = new Users();

            $user->username = $request->post('username');
            $user->email    = $request->post('email');
            $user->password = Hash::make($request->post('password1'));

            if ($user->save() === true) {
                Auth::login($user);

                return redirect('/');
            } else {

            }


        } else {
            echo 'passwords different';

            exit;
        }
    }

    public function logout() {
        Auth::logout();

        return view('index');
    }
}
