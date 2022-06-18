@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <title>Catalog</title>
@endsection


@section('content')

    @include('layouts.header')
    <main>
        <div class="filter">
            <div class="first_button">
                <div class="cont">
                    <input type="checkbox" class="checkbox2" id="checkbox2" name="checkbox2" value="yes">
                    <label for="checkbox2" class="checkbox_label2">
                        <img src="./img/first.png" alt="f">
                        <p>Фільтр</p>
                    </label>
                    <div class="button_menu2">
                        <div class="catalog_page2">
                            <h2 class="title_name">Книжки</h2>
                            @include('layouts.filter')
                        </div>
                    </div>
                </div>

            </div>

            <div class="second_button">
                <div class="cont">
                    <img src="./img/second.png" alt="s">
                    <p>Сортування</p>
                </div>
            </div>
        </div>

        <section class="Catalog">
            <div class="desktop4">
                <div class="catalog_page">
                    <h2 class="title_name">Книжки</h2>
                    @include('layouts.filter')
                </div>

                <div class="Page_section">
                    <h1>
                        @if(isset($finded_section))
                            @foreach($finded_section as $word)
                                @if(count($finded_section) > 1)
                                    {{$word . ','}}
                                @else
                                    {{$word}}
                                @endif
                            @endforeach
                        @else
                            Каталог
                        @endif
                    </h1>
                    <div class="row">
                        @if(count($finded_books))
                            @foreach($finded_books as $finded_book)
                                <div class="col">
                                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                    ['name' => $finded_book->book_name, 'author' => $finded_book->full_name]) }}">
                                        <img src="data:image/png;base64,{!! base64_encode($finded_book->book_image) !!}"
                                             alt="Andjey - witcher"/>
                                    </a>
                                    <div class='second_need'>

                        <span class="name">{{$finded_book->book_name}}<a
                                @if(in_array($finded_book->id, $wishlist_check))
                                    href="{{route('wishlist', $finded_book->id)}}"
                                @elseif(session('user')==null)
                                    href="{{route('login')}}"
                                @else
                                    href="{{route('add_wishlist', $finded_book->id)}}"
                                        @endif
                                ><img src="./img/Vector.png" alt="heart"></a></span>
                                        <span class="author">{{$finded_book->full_name}}</span>
                                        <div class='cartcatalog'>
                                            <span class="price">{{$finded_book->book_price}}₴</span>
                                            <a href="@if(in_array($finded_book->id, $books_check))
                                                   {{route('cart')}}
                                               @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $finded_book->id)}}
                                               @endif
                                                " class="add_to_cart">
                                                <img src="./img/svg/Catalog_cart.svg" alt="cartcatalog">
                                            </a>
                                            <a href="@if(in_array($finded_book->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $finded_book->id)}}
                                               @endif
                                               " class="add_to_cart-mobile">
                                                <img src="./img/Cart.png" alt="cartcatalog">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="Pages">
                <a href="#" id="Active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">...</a>
                <a href="#">Остання</a>
                <a href="#">Наступна</a>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection


