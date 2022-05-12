<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.blade.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.blade.php");
}
?>
@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <title>Personal page</title>
@endsection

@include('layouts.header')
<div class="personal_page">
    @section('content')
        <div class="content">
            <div class="contentt">
                <!-- logged in user information -->
                <?php
                $login = $_POST['email'];
                $password = $_POST['password'];
                ?>
                @if(isset($password))
                    <p>Welcome <strong> <br>  {{ $login }}  <br>Ваш пароль: {{ $password }} </strong></p>
                    <p><a href="{{ action([\App\Http\Controllers\PagesController::class, 'Landing']) }}"
                          style="border:1px; border-color:#171717; color: #5C5C5C;">Перейти на головну сторінку</a></p>
                    <p><a href="{{ action([\App\Http\Controllers\PagesController::class, "Landing"]) }}"
                          style="color: red;">logout</a></p>
                @endif
                @foreach($array as $element)
                    {{ $element }} <br>
                @endforeach
            </div>
        </div>

    @endsection
</div>

