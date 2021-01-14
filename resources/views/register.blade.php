@extends('layout.master')
@section('title','Register')
@section('content')

<h1>Register new Account</h1>

<a href="{{ route('login') }}">Login</a>
<br>

<form method="post" action="">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}">
        <span class="error" id="email_err">{{ $errors->first('name') }}</span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter Email Address" name="email" value="{{ old('email') }}">
        <span class="error" id="email_err">{{ $errors->first('email') }}</span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{ old('password') }}">
        <span class="error" id="password_err">{{ $errors->first('password') }}</span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}">
        <span class="error" id="password_err">{{ $errors->first('confirm_password') }}</span>
    </div>

    <?php
        if(session()->has('error')){
            echo session('error');
        }
    ?>

    <div class="form-group">
        <button type="submit" class="btn-style">Register</button>
    </div>
</form>

@endsection