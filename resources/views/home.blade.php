@extends('layout.master')
@section('title','Home')
@section('content')

<h1>Home</h1>

<a href="{{ route('logout') }}">Logout</a>
<br>

<?php
    if(Auth::user()->role == 'U'){
        echo "Name: ".Auth::user()->name.' email: '.Auth::user()->email;
    }else{
        foreach ($users as $key => $user) {
            echo "Name: ".$user["name"].' email: '.$user["email"].' <br>';
        }
    }
?>

@endsection