@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <title>Wishlist</title>
@endsection


@include('layouts.header')




@section('content')
    <div class="search_result">
        <h1>Список бажаного</h1>
        <div class="Page_section">
            <div class="row">

                @if(count($data)>0)
                    @foreach($data as $dat)
                        @foreach($dat as $example)
                            <div class="col">
                                <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                       ['name' => $example->book_name, 'author' => $example->full_name]) }}">
                                    <img src="data:image/png;base64,{!! base64_encode($example->book_image) !!}"
                                         alt="Andjey - witcher"/>
                                </a>
                                <div class='second_need'><span class="name">{{$example->book_name}}<a
                                            href="{{route('delete_from_wishlist', $example->id)}}"
                                            class="mobile_cross"><img
                                                src="{{asset('./img/png/cross.png')}}" alt="heart"></a></span>
                                    <span class="author">{{$example->full_name}}</span>
                                    <div class='cartcatalog'>



                                        <span class="price">
                                            {{$example->book_price}}₴
                                        </span>
                                        <a href="@if(in_array($example->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $example->id)}}
                                               @endif
                                                " class="add_to_cart">
                                            <img src="./img/svg/Catalog_cart.svg" alt="cartcatalog">
                                        </a>
                                        <a href="@if(in_array($example->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $example->id)}}
                                               @endif
                                                " class="add_to_cart-mobile">
                                            <img src="./img/Cart.png" alt="cartcatalog">
                                        </a>
                                        <a href="{{route('delete_from_wishlist', $example->id)}}"
                                           class="delete_from_cart">
                                            <img src="{{asset('./img/png/cross.png')}}" alt="cross" class="cross">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @else
                    <div class='error'>Ваш список побажань ще порожній</div>
                @endif
            </div>
        </div>
    </div>
    @include('layouts.footer')

@endsection
