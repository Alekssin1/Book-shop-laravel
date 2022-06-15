@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <title>{{$book_name}}</title>
@endsection
@section('content')


    @include("layouts.header")


    <main>
        <section class="Infopage2">
            <div class="desktop3">
                <h1>
                    {{ $book_name }}  - {{ $book_author }}
                </h1>
                <div class="Categories2">
                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="Main Category">
                        Усе про книгу
                    </a>
                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'characteristic'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="Characteristics Category">
                        Характеристики
                    </a>
                    <a href="#!" class="Reviews Category">
                        Рецензії
                    </a>
                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'author'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="AboutAuthor Category">
                        Про автора
                    </a>
                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'author_books'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="Author_books Category">
                        Інші книги автора
                    </a>
                </div>
                @foreach($found_book as $found_books)
                    <div class="content">

{{--                        <div class="bookpreview">--}}
                            <div class="characteristics">
                                <div class="first">
                                    <div class="first_column">
                                        Автор
                                    </div>
                                    <div class="second_column">
                                        {{$book_author}}
                                    </div>
                                </div>

                                <div class="first">
                                    <div class="first_column">
                                        Видавництво
                                    </div>
                                    <div class="second_column">
                                        {{$found_books->house_name}}
                                    </div>
                                </div>
                                @if(strlen($found_books->book_series) > 0)
                                    <div class='first'>
                                        <div class='first_column'>
                                            Серія книг
                                        </div>
                                        <div class='second_column'>
                                            {{$found_books->book_series}}
                                        </div>
                                    </div>
                                @endif

                                <div class="first">
                                    <div class="first_column">
                                        Мова
                                    </div>
                                    <div class="second_column">
                                        {{$found_books->language}}
                                    </div>
                                </div>

                                <div class="first">
                                    <div class="first_column">
                                        Рік видання
                                    </div>
                                    <div class="second_column">
                                        {{$found_books->publish_year}}
                                    </div>
                                </div>
                                @if(strlen($found_books->book_translator) > 0)
                                    <div class='first'>
                                        <div class='first_column'>
                                            Перекладач
                                        </div>
                                        <div class='second_column'>
                                            {{$found_books->book_translator}}
                                        </div>
                                    </div>
                                @endif


                                <div class="first">
                                    <div class="first_column">
                                        Кількість сторінок
                                    </div>
                                    <div class="second_column">
                                        {{$found_books->book_pages}}
                                    </div>
                                </div>
                            </div>

{{--                        </div>--}}
                        <div class="info">
                            <div class="characteristic_preview">
                                <div class="Image Space">
                                    <img src="data:image/png;base64,{!! base64_encode($found_books->book_image) !!}" alt="characteristic_image" class= "characteristic_image"/>
                                </div>
                                <div class="Name Space">
                                    {{$book_name}}
                                    <br>{{$book_author}}
                                </div>
                            </div>
                            <div class="buy_menu">
                                <div class="Price Tab">
                                    {{$found_books->book_price}}₴
                                </div>
                                <div class="Cart Tab">
                                    <button class="cart_button">
                                        <img src="{{asset('img/svg/Cart1.svg')}}" alt="cartmenu" class="cartmenu">
                                    </button>
                                </div>
                                <div class="Wishlist Tab">
                                    <button class="wishlist_button">
                                        <img src="{{asset('img/svg/Vector.svg')}}" alt="wishlistmenu" class="wishlistmenu">
                                    </button>
                                </div>
                                <div class="Availability Tab">
                                    @if($found_books->book_quantity)
                                        Є в наявності
                                    @else
                                        Зараз відсутня
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>

        <section class="Infopage2_mobile">
            <div class="mobile3">
                <div class="mobile3_content">
                    <div class="mobile3_bookpreview">
                        <img src="data:image/png;base64,{!! base64_encode($found_books->book_image) !!}" alt="BookPreview" class= "mobile_book"/>
                        <div class="mobile3_text_book">
                            <h1>{{ $book_name }}</h1>
                            <p>{{ $book_author }}</p>
                        </div>
                        <div class="mobile_buy">
                            <div class="mobile_accessibility">
                                <p>
                                    @if($found_books->book_quantity)
                                        Є в наявності
                                    @else
                                        Зараз відсутня
                                    @endif

                                </p>
                                <h1>{{$found_books->book_price}}₴</h1>
                            </div>
                            <button class="cart_button">
                                <img src="{{asset('img/svg/Cart1.svg')}}" alt="cartmenu" class="cartmenu">
                            </button>
                        </div>
                        <div class="mobile_description">
                            <h1>Опис книги:</h1>
                            <div class="mobile_full_description">
                                <p>
                                    {{$found_books->book_annotation}}
                                </p>
                            </div>
                        </div>
                        <div class="more_content">
                            <a href="{{ action([\App\Http\Controllers\PagesController::class, 'author_books'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="Author_books Other">
                                Інші книги автора
                            </a>
                            <a href="#!" class="Reviews Other">
                                Рецензії
                            </a>
                        </div>

                        <div class="characteristics_mobile">
                            <div class="first">
                                <div class="first_column">
                                    Автор
                                </div>
                                <div class="second_column">
                                    {{$book_author}}
                                </div>
                            </div>

                            <div class="first">
                                <div class="first_column">
                                    Видавництво
                                </div>
                                <div class="second_column">
                                    {{$found_books->house_name}}
                                </div>
                            </div>
                            @if(strlen($found_books->book_series) > 0)
                                <div class='first'>
                                    <div class='first_column'>
                                        Серія книг
                                    </div>
                                    <div class='second_column'>
                                        {{$found_books->book_series}}
                                    </div>
                                </div>
                            @endif

                            <div class="first">
                                <div class="first_column">
                                    Мова
                                </div>
                                <div class="second_column">
                                    {{$found_books->language}}
                                </div>
                            </div>

                            <div class="first">
                                <div class="first_column">
                                    Рік видання
                                </div>
                                <div class="second_column">
                                    {{$found_books->publish_year}}
                                </div>
                            </div>
                            @if(strlen($found_books->book_translator) > 0)
                                <div class='first'>
                                    <div class='first_column'>
                                        Перекладач
                                    </div>
                                    <div class='second_column'>
                                        {{$found_books->book_translator}}
                                    </div>
                                </div>
                            @endif


                            <div class="first">
                                <div class="first_column">
                                    Кількість сторінок
                                </div>
                                <div class="second_column">
                                    {{$found_books->book_pages}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        @endforeach
        @include("layouts.footer")

    </main>

@endsection
