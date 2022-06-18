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
                    {{ $book_name }} - {{ $book_author }}
                </h1>
                <div class="Categories4">
                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="Main Category">
                        Усе про книгу
                    </a>
                    <a href="{{ action([\App\Http\Controllers\PagesController::class, 'characteristic'],
                                    ['name' => $book_name, 'author' => $book_author]) }}"
                       class="Characteristics Category">
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

                <div class="content2">
                    <div class="Page_section2">
                        <div class="row">
                            @if(count($found_books)>0)
                                @foreach($found_books as $book)
                                    <div class="col">
                                        <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                              ['name' => $book->book_name, 'author' => $book->full_name]) }}">
                                            <img src="data:image/png;base64,{!! base64_encode($book->book_image) !!}"
                                                 alt="Andjey - witcher"/>
                                        </a>
                                        <div class='second_need'><span class="name">{{$book->book_name}}<a
                                                    @if(in_array($book->id, $wishlist_check))
                                                        href="{{route('wishlist', $book->id)}}"
                                                    @elseif(session('user')==null)
                                                        href="{{route('login')}}"
                                                    @else
                                                        href="{{route('add_wishlist', $book->id)}}"
                                        @endif
                                ><img src="{{asset('./img/Vector.png')}}" alt="heart"></a></span>
                                            <span class="author">{{$book->full_name}}</span>
                                            <div class='cartcatalog'>
                                                <span class="price">{{$book->book_price}}₴</span>
                                                <a href="@if(in_array($book->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $book->id)}}
                                               @endif
                                                " class="add_to_cart">
                                                    <img src="{{asset('./img/svg/Catalog_cart.svg')}}"
                                                         alt="cartcatalog">
                                                </a>
                                                <a href="@if(in_array($book->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $book->id)}}
                                               @endif
                                                " class="add_to_cart-mobile">
                                                    <img src="{{asset('./img/Cart.png')}}" alt="cartcatalog">
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
            </div>
        </section>

        <section class="Infopage2_mobile">
            <div class="mobile3">
                <div class="mobile3_content">
                    <h1>Інші книги автора: {{$book_author}}</h1>
                    <div class="more_content">
                        <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" class="Author_books Other">
                            Усе про книгу
                        </a>
                        <a href="#!" class="Reviews Other">
                            Рецензії
                        </a>
                    </div>
                    <div class="Page_section2">
                        <div class="row">
                            @if(count($found_books)>0)
                                @foreach($found_books as $book)
                                    <div class="col">
                                        <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                              ['name' => $book->book_name, 'author' => $book->full_name]) }}">
                                            <img src="data:image/png;base64,{!! base64_encode($book->book_image) !!}"
                                                 alt="Andjey - witcher"/>
                                        </a>
                                        <div class='second_need'><span class="name">{{$book->book_name}}<a
                                                    @if(in_array($book->id, $wishlist_check))
                                                        href="{{route('wishlist', $book->id)}}"
                                                    @elseif(session('user')==null)
                                                        href="{{route('login')}}"
                                                    @else
                                                        href="{{route('add_wishlist', $book->id)}}"
                                        @endif
                                ><img src="{{asset('./img/Vector.png')}}" alt="heart"></a></span>
                                            <span class="author">{{$book->full_name}}</span>
                                            <div class='cartcatalog'>
                                                <span class="price">{{$book->book_price}}₴</span>
                                                <a href="@if(in_array($book->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $book->id)}}
                                               @endif
                                                " class="add_to_cart">
                                                    <img src="{{asset('./img/svg/Catalog_cart.svg')}}"
                                                         alt="cartcatalog">
                                                </a>
                                                <a href="@if(in_array($book->id, $books_check))
                                                   {{route('cart')}}
                                                   @elseif(session('user')==null)
                                               {{route('login')}}
                                               @else
                                                   {{route('add_cart', $book->id)}}
                                               @endif
                                                " class="add_to_cart-mobile">
                                                    <img src="{{asset('./img/Cart.png')}}" alt="cartcatalog">
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
            </div>
            </div>
        </section>
        @include("layouts.footer")

    </main>

@endsection

