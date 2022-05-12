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
<div class="search_result">
    <div class="Page_section">
        <h1>Результат пошуку</h1>
        <div class="row">


            <?php
            $query = $_GET['book'];
            $min_length = 3;
            $index = 0;
            if (strlen($query) >= $min_length) {
                $query = htmlspecialchars($query);
                $query = $conn->real_escape_string($query);
                $raw_results = $conn->query("SELECT * FROM catalog3
                            WHERE (`book_name` LIKE '%" . $query . "%') OR (`book_author` LIKE '%" . $query . "%') ");
                if ($raw_results->num_rows > 0) {
                    while ($results = $raw_results->fetch_array(MYSQLI_ASSOC) and $index < 15) {
                        $book_name = $results['book_name'];
                        $book_author = $results['book_author']; ?>
                        <div class="col">
                            <a  href="{{ action([\App\Http\Controllers\PagesController::class, 'info'],
                                    ['name' => $book_name, 'author' => $book_author]) }}" >
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
                } else {
                    echo "<div class='error'>Немає результатів пошуку за вашим запитом</div>";
                }
            } else {
                echo "<div class='error'>Мінімальна довжина: " . $min_length . "</div>";
            } ?>


        </div>
    </div>
</div>
@include('layouts.footer')

@endsection
