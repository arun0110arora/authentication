<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Auth, Hash, Carbon\Carbon;

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

                User::where('id', Auth::user()->id)
                    ->update(['last_activity_at' => Carbon::now()]);
                return redirect()->route('home');

            }else{
                return redirect()->back()
                        ->with('error', 'Invalid email and password combination')
                        ->withInput();
            }
        }

    	return view('login');
    }

    public function register(Request $request){

        if($request->isMethod('post')){
            // dd($request->all());
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $user           = new User;
            $user->email    = $postData['email'];
            $user->name     = $postData['name'];
            $user->password = Hash::make($postData['password']);
            $user->save();

            return redirect()->route('home');
        }

        return view('register');
    }

    public function logout(){
        
        if(Auth::check()){
            Auth::logout();
        }
        
        return redirect()->route('login');
    }
}