<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class signupController extends Controller
{
    //

    function signup_form()
    {
        return view('signup');
    }
    function insert(Request $req)
    {
        $user = new USER;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        //dd($req->email);
        $user->save();
        return redirect('login');
    }
    public function store(Request $req)
    {
        $this->validate($req, ['email' => 'required|email,unique:username,unique:email']);
    }
    public function login(Request $req)
    {
        $user = User::where('email', $req->input('email'))->get();
        if ($user[0]->password == $req->input('password')) {
            $req->session()->put('user', $user[0]->user);
            return redirect('profile');
        } else {
            echo "Wrong Email Or Password";
        }
    }
}
