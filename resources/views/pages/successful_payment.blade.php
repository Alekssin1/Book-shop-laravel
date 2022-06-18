@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <title>Cart</title>
@endsection
@section('content')
    <div class="successful_payment">
        <div class="successful_message">
            Транзакція пройшла успішно.
            <a href="{{ action([\App\Http\Controllers\PagesController::class, 'catalog']) }}" class="successful_message_link">Повернутися до каталогу</a>
        </div>
    </div>
@endsection
