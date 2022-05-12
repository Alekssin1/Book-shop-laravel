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


@include("layouts.header")


<main>
    <section class="Infopage1">
        <div class="desktop3">
            <h1>
                {{ $book_name }}  - {{ $book_author }}
            </h1>
            <div class="Categories">
                <a href="#!" class="Main Category">
                    Усе про книгу
                </a>
                <a href="#!" class="Characteristics Category">
                    Характеристики
                </a>
                <a href="#!" class="Reviews Category">
                    Рецензії
                </a>
                <a href="#!" class="AboutAuthor Category">
                    Про автора
                </a>
                <a href="#!" class="OtherVersions Category">
                    Інші видання
                </a>
            </div>
            <div class="content">
                <?php
                if (!empty($book_name) and !empty($book_author)){
                $raw_results = $conn->query("SELECT * FROM catalog3
                                                        WHERE (`book_name` LIKE '%" . $book_name . "%')
                                                        AND (`book_author` LIKE '%" . $book_author . "%') ");
                }
                $results = $raw_results->fetch_array(MYSQLI_ASSOC);
                ?>
                <div class="bookpreview">
                    <?php echo '<img src="data:image/png;base64,'
                        . base64_encode($results['book_image']) . '" alt= "BookPreview" class= "book"/>';?>
                </div>
                <div class="info">
                    <div class="buy_menu">
                        <div class="Price Tab">
                            <?php echo $results['book_price'] . "₴" ?>
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
                            <?php
                            if ($results['book_quantity'] > 0) {
                                echo "Є в наявності";
                            } else {
                                echo "Зараз відсутня";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="description">
                        <h2>
                            Опис <?php echo $results['book_name']; ?>
                        </h2>
                        <?php echo $results['book_annotation']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Infopage1_mobile">
        <div class="mobile3">
            <div class="mobile3_content">
                <div class="mobile3_bookpreview">
                    <?php echo '<img src="data:image/jpeg;base64,'
                        . base64_encode($results['book_image']) . '" alt= "BookPreview" class= "mobile_book"/>';?>
                    <div class="mobile3_text_book">
                        <h1>{{ $book_name }}</h1>
                        <p>{{ $book_author }}</p>
                    </div>
                    <div class="mobile_buy">
                        <div class="mobile_accessibility">
                            <p>
                                <?php
                                if ($results['book_quantity'] > 0) {
                                    echo "Є в наявності";
                                } else {
                                    echo "Зараз відсутня";
                                }
                                ?>
                            </p>
                            <h1><?php echo $results['book_price'] . "₴" ?></h1>
                        </div>
                        <button class="cart_button">
                            <img src="{{asset('img/svg/Cart1.svg')}}" alt="cartmenu" class="cartmenu">
                        </button>
                    </div>
                    <div class="mobile_description">
                        <h1>Опис книги:</h1>
                        <div class="mobile_full_description">
                            <p>
                                <?php echo $results['book_annotation']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="more_content">
                        <a href="#!" class="Author_books Other">
                            Інші книги автора
                        </a>
                        <a href="#!" class="Book_houses Other">
                            Інші видання
                        </a>
                    </div>

                    <div class="characteristics_mobile">
                        <div class="first">
                            <div class="first_column">
                                Автор
                            </div>
                            <div class="second_column">
                                <?php echo $results['book_author']?>
                            </div>
                        </div>

                        <div class="first">
                            <div class="first_column">
                                Видавництво
                            </div>
                            <div class="second_column">
                                <?php echo $results['publishing_house']?>
                            </div>
                        </div>

                        <?php
                        if (strlen($results['book_series']) > 0) {
                            $book_series = $results['book_series'];
                            echo "<div class='first'>
                                    <div class='first_column'>
                                        Серія книг
                                    </div>
                                    <div class='second_column'>
                                        $book_series
                                    </div>
                                </div>";
                        }
                        ?>

                        <div class="first">
                            <div class="first_column">
                                Мова
                            </div>
                            <div class="second_column">
                                <?php echo $results['book_language']?>
                            </div>
                        </div>

                        <div class="first">
                            <div class="first_column">
                                Рік видання
                            </div>
                            <div class="second_column">
                                <?php echo $results['publish_year']?>
                            </div>
                        </div>

                        <?php
                        if (strlen($results['book_translator']) > 0) {
                            $book_translator = $results['book_translator'];
                            echo "<div class='first'>
                                    <div class='first_column'>
                                        Перекладач
                                    </div>
                                    <div class='second_column'>
                                        $book_translator
                                    </div>
                                </div>";
                        }
                        ?>


                        <div class="first">
                            <div class="first_column">
                                Кількість сторінок
                            </div>
                            <div class="second_column">
                                <?php echo $results['book_pages']?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include("layouts.footer")

</main>

@endsection
