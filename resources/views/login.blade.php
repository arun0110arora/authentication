@extends('layout.master')
@section('title','Login')
@section('content')

<h1>Login to your Account</h1>

<a href="{{ route('register') }}">Register</a>
<br>

<form method="post" action="">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter Email Address" name="email" value="{{ old('email') }}">
        <span class="error" id="email_err">{{ $errors->first('email') }}</span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Enter Password" name="password" value="{{ old('password') }}">
        <span class="error" id="password_err">{{ $errors->first('password') }}</span>
    </div>

    <?php
        if(session()->has('error')){
            echo session('error');
        }
    ?>

    <div class="form-group">
        <button type="submit" class="btn-style">Login</button>
    </div>
</form>

@endsection