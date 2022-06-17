@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <title>Cart</title>
@endsection


@include('layouts.header')




@section('content')
    <div class="search_result">
        <div class="Page_section">
            <h1>Корзина</h1>
            <div class="row">

                @if(count($data)>0)
                    @foreach($data as $example)
                            <div class="col">
                                <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                       ['name' => $example[0]->book_name, 'author' => $example[0]->full_name]) }}">
                                    <img src="data:image/png;base64,{!! base64_encode($example[0]->book_image) !!}"
                                         alt="Andjey - witcher"/>
                                </a>
                                <div class='second_need'><span class="name">{{$example[0]->book_name}}<a href="{{route('delete_from_cart')}}"
                                                                                                      class="mobile_cross"><img
                                                src="{{asset('./img/png/cross.png')}}" alt="heart"></a></span>
                                    <span class="author">{{$example[0]->full_name}}</span>
                                    <div class='cartcatalog'>



                                        <span class="price">
                                            @if($total_price[$example[0]->id]!=null)
                                                {{$total_price[$example[0]->id]}}₴
                                            @else
                                                {{$example[0]->book_price}}₴
                                            @endif
                                        </span>
                                        <form method="post" action="{{route('check_quantity', $example[0]->id)}}">
                                            @csrf
                                            <label class="check">
                                                <select name="book_num" onchange="this.form.submit()">
                                                    <option
                                                        value="1">1
                                                    </option>

                                                    <option
                                                        value="2">2
                                                    </option>
                                                    <option
                                                        value="3">3
                                                    </option>
                                                    <option
                                                        value="4">4
                                                    </option>
                                                    <option
                                                        value="5">5
                                                    </option>
                                                    <option
                                                        value="10">10
                                                    </option>


                                                </select>
                                            </label>
                                        </form>
                                        <a href="{{route('delete_from_cart')}}" class="delete_from_cart">
                                            <img src="{{asset('./img/png/cross.png')}}" alt="cross" class="cross">
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
