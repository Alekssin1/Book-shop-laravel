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
    <?php
    $conn = new mysqli("127.0.0.1", "root", "root", "books", 3309);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->select_db("books");
    $result = $conn->query("SELECT DATABASE()");
    $row = $result->fetch_row();
    ?>

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
                    <h1>Художня література</h1>
                    <div class="row">
                        <?php
                        $raw_results = $conn->query("SELECT * FROM catalog3 ");
                        while($results = $raw_results->fetch_array(MYSQLI_ASSOC)){
                        $book_name = $results['book_name'];
                        $book_author = $results['book_author']; ?>
                        <div class="col">
                            <a href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                    ['name' => $book_name, 'author' => $book_author]) }}">
                                <?php echo '<img src="data:image/png;base64,'
                                    . base64_encode($results['book_image']) . '" alt="Andjey - witcher"/>'; ?>
                            </a>
                            <div class='second_need'>

                        <span class="name"><?php echo $results['book_name'] ?><img src="./img/Vector.png"
                                                                                   alt="heart"></span>
                                <span class="author"><?php echo $results['book_author'] ?></span>
                                <div class='cartcatalog'>
                                    <span class="price"><?php echo $results['book_price']?>₴</span>
                                    <a href="#!" class="add_to_cart">
                                        <img src="./img/svg/Catalog_cart.svg" alt="cartcatalog">
                                    </a>
                                    <a href="#!" class="add_to_cart-mobile">
                                        <img src="./img/Cart.png" alt="cartcatalog">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }
                        ?>
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


