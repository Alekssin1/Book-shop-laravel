@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <title>search</title>
@endsection


@include('layouts.header')




@section('content')
<div class="search_result">
    <div class="Page_section">
        <h1>Результат пошуку</h1>
        <div class="row">


            @if(count($data)>0)
                @foreach($data as $example)
                    <div class="col">
                        <a  href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                       ['name' => $example->book_name, 'author' => $example->full_name]) }}" >
                            <img src="data:image/png;base64,{!! base64_encode($example->book_image) !!}" alt="Andjey - witcher"/>
                        </a>
                        <div class='second_need'><span class="name">{{$example->book_name}}<img src="./img/Vector.png" alt="heart"></span>
                            <span class="author">{{$example->full_name}}</span>
                            <div class='cartcatalog'>
                                <span class="price">{{$example->book_price}}₴</span>
                                <a href="#!" class="add_to_cart">
                                    <img src="./img/svg/Catalog_cart.svg" alt="cartcatalog">
                                </a>
                                <a href="#!" class="add_to_cart-mobile">
                                    <img src="./img/Cart.png" alt="cartcatalog">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class='error'>Немає результатів пошуку за вашим запитом</div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection
