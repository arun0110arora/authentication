<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Auth;

class UserController extends Controller
{
    public function home(){

        if(Auth::check()){
            $users = array();
            if(Auth::user()->role == 'A'){
                $users = User::where('role', 'U')
                            ->get()->toArray();
            }
        }else{
            return redirect()->route('login');
        }

        return view('home', compact('users'));
    }
}