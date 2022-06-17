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
                    @foreach($data as $dat)
                        @foreach($dat as $example)
                            <div class="col">
                                <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                       ['name' => $example->book_name, 'author' => $example->full_name]) }}">
                                    <img src="data:image/png;base64,{!! base64_encode($example->book_image) !!}"
                                         alt="Andjey - witcher"/>
                                </a>
                                <div class='second_need'><span class="name">{{$example->book_name}}<a href="{{route('delete_from_cart', $example->id)}}"
                                                                                                      class="mobile_cross"><img
                                                src="{{asset('./img/png/cross.png')}}" alt="heart"></a></span>
                                    <span class="author">{{$example->full_name}}</span>
                                    <div class='cartcatalog'>



                                        <span class="price">
                                            @foreach($info as $item)
                                                @if($item->id_user == session('user')['id'] && $item->id_book == $example->id && $item->quantity>1)
                                                    {{$item->quantity*$example->book_price}}₴
                                                @endif
                                                @if($item->id_user == session('user')['id'] && $item->id_book == $example->id && $item->quantity==1)
                                                    {{$example->book_price}}₴
                                                @endif
                                            @endforeach

                                        </span>
                                        <form method="post" action="{{route('check_quantity', $example->id)}}">
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
                                        <a href="{{route('delete_from_cart', $example->id)}}" class="delete_from_cart">
                                            <img src="{{asset('./img/png/cross.png')}}" alt="cross" class="cross">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                    <div class="buy">
                        До сплати:
                        <div class="cheque">
                            <div class="cheque_price">
                                {{$total_price}}₴
                            </div>
                            <div class="cheque_buy">
                                <a href="{{route('buy')}}">
                                <img src="{{asset('img/svg/Cart1.svg')}}">
                                </a>
                            </div>

                        </div>
                    </div>
                @else
                    <div class='error'>Ваша корзина порожня</div>
                @endif
            </div>
        </div>
    </div>
    @include('layouts.footer')

@endsection
