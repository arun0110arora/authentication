<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        if($request->isMethod('post')){
            // dd($request->all());
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            if (Auth::attempt([
                'email' => $postData['email'],
                'password' => $postData['password']
            ])) {

                if(Auth::user()->type == 'U'){
                    return redirect()->route('home');
                }else{
                    return redirect()->route('admin_home');
                }
            }else{
                return redirect()->back()
                        ->with('error', 'Invalid email and password combination')
                        ->withInput();
            }
        }


    	return view('login');
    }

    public function register(){

        return view('register');
    }
}