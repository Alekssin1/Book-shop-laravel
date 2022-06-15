{{--@include('connect_to_database')--}}
@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <title>Registration system PHP and MySQL</title>
@endsection

@section('content')
    <div class="register">
        <form method="post" action="{{ route('signup') }}">
            @csrf
            @include('errors')
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Surname</label>
                <input type="text" name="usersurname">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>
                Already a member? <a href="{{ route('login') }}">Sign in</a>
            </p>
        </form>
    </div>
@endsection
