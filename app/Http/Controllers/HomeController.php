<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;//
use Input;

class HomeController extends Controller
{
    // Filter for members area
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'getMembers']);
    }

    public function getIndex()
    {
        return redirect('users');
    }

    // public function getLogin()
    // {
    //     //$creds = ['username' => 'alex', 'password' => '111111'];
    //     //return (Auth::validate($creds) ? 'Match' : "No match");
    //     //Auth::attempt($creds);
    //     //return redirect('users');
    //     return view('login');
    // }

    // public function postLogin()
    // {
    //     $creds = array(
    //         'username' => Input::get('username'),
    //         'password' => Input::get('password')
    //     );

    //     if (Auth::attempt($creds)) {
    //         return redirect()->intended('users');//Redirect::intended('users');
    //     } else {
    //         return redirect('login')->withInput()
    //                 //->withErrors()
    //                 ->with(['message' => 'The username or password not match']);
    //     }
    // }

    // public function getLogout()
    // {
    //     Auth::logout();
    //     return redirect('users');
    // }

    public function getMembers()
    {
        return '<h1>This is the members area.</h1>';
    }
}