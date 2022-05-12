@extends('layouts.app')
@section('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.css')}}">
    <title>Landing</title>
@endsection


@section('content')
    <header class="header">
        <div class="mainmenu">

            <div class="header_logo">
                <img src="./img/svg/Logo.svg" alt="Landing" class="header_logo-pic">
            </div>

            <nav class="menu">
                <ul class="header_list">
                    <li class="header_item">
                        <a href="{{ action([\App\Http\Controllers\PagesController::class, 'catalog']) }}" class="header_link">Каталог</a>
                    </li>
                    <li class="header_item">
                        <a href="#!" class="header_link">Акції</a>
                    </li>
                    <li class="header_item">
                        <a href="#!" class="header_link">Співробітництво</a>
                    </li>
                    <li class="header_item">
                        <a href="#!" class="header_link">Доставка</a>
                    </li>
                    <li class="header_item">
                        <a href="#!" class="header_link">Контакти</a>
                    </li>
                </ul>
            </nav>

            <a href="#!" class="cart"><img src="./img/svg/Cart.svg" alt="cart" class="header_cart-pic"></a>

        </div>

    </header>

    <main class="main">
        <section class="intro">
            <div class="SearchOnSite">
                <form action="{{ action([\App\Http\Controllers\PagesController::class, 'search']) }}" method="GET">
                    @csrf
                    <div class="searchBar">
                        <div class="searchButton">
                            <button type="submit"><i class="fa fa-search"></i> <img src="./img/png/loupe.png"
                                                                                    alt="searchbar"
                                                                                    class="search_loupe"></button>
                        </div>
                        <div class="search">
                            <input type="search" id="site-search" placeholder="Введіть назву книги..."
                                   name="book">
                        </div>
                    </div>
                </form>
            </div>

            <a href="#!" class="chat"><img src="./img/svg/Chat.svg" alt="chat" class="header_chat-pic"></a>

            <div class="HeaderText1">
                В нашій книгарні ви можете знайти літературу з усього світу, як мовою оригіналу так і в перекладі.
            </div>

            <div class="HeaderText2">
                «Книги – не мертві речі, а істоти, що містять у собі насіння життя. В них – чистісінька енергія і
                екстракт того живого розуму, що їх створив»
                <br>Д.Мільтон
            </div>


        </section>
        <section class="Block1">
            <div class="desktop">
                <h1 class="item-h1">Читайте книжки з усього світу за <br>допомогою “House of stories”</h1>
                <div class="row align-items-start">
                    <div class="col-5">
                        Як казала Опра Вінфрі: “Книги стали моєю
                        перепусткою в особисту свободу”,- саме
                        тому мета нашої книгарні - дати кожній
                        людині свободу вибору - необмежений
                        нічим список літератури.
                    </div>
                    <div class="col-5">
                        <ul>
                            <li class="styleblock2">Книги як відомих, так і нових,<br>маловідомих авторів</li>
                            <li class="styleblock2">Співпраця з українськими та<br>іноземними видавництвами</li>
                            <li class="styleblock2">Велика кількість професійної<br>літератури</li>
                            <li class="styleblock2">Проведення тематичних заходів з<br>конкурсами та акціями</li>
                            <li class="styleblock2">Доступні кожному ціни</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="Block1_mobile">
            <div class="mobile">
                <h1 class="item-h1">Читайте книжки з усього світу за допомогою “House of stories”</h1>
                <div class="mobile_row">
                    В нашій книгарні ви можете знайти літературу з усього
                    світу, як мовою оригіналу
                    так і в перекладі адже, як казала Опра Вінфрі: “Книги стали моєю перепусткою в особисту свободу”
                </div>
            </div>
        </section>


        <section class="mobile_text">
            <div class="text_in_div">
                <p>Ми працюємо з багатьма популярними видавництвами</p>
            </div>

            <div class="images_block">
                <div class="row">
                    <div class="col">
                        <div class="booksalers">
                            <img src="./img/Frame 10.png" alt="first">
                            <h1>Видавництво “Клуб сімейного дозвілля”</h1></div>
                    </div>

                    <div class="col">
                        <div class="booksalers">
                            <img src="./img/Frame 11.png" alt="first">
                            <h1>Видавництво “А-БА-БА-ГА-ЛА-МА-ГА”</h1>
                        </div>

                    </div>

                    <div class="col">
                        <div class="booksalers">
                            <img src="./img/Frame 12.png" alt="first">
                            <h1>Видавництво “Pearson”</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text_in_div_2">
                <p>Доступна ціна для кожного, а також акції кожен тиждень</p>
            </div>


            <div class="images_block2">
                <div class="row">
                    <div class="col">
                        <img src="./img/1.png" alt="first">
                        <div class="mobile_sales">
                            <h1>Відьмак. Хрещення вогнем.</h1>
                            <h2>Анджей Сапковський</h2>
                            <div class="sales_price_before">190 ₴</div>
                            <div class="sales_price_after">140 ₴</div>
                        </div>

                    </div>

                    <div class="col">
                        <img src="./img/2.png" alt="first">
                        <div class="mobile_sales">
                            <h1>Стрілець. Темна вежа I</h1>
                            <h2>Стівен Кінг</h2>
                            <div class="sales_price_before">180 ₴</div>
                            <div class="sales_price_after">149 ₴</div>
                        </div>

                    </div>

                    <div class="col">
                        <img src="./img/3.png" alt="first">
                        <div class="mobile_author_sale">
                            <h1>Тиждень Стівена Кінга</h1>
                            Знижки на всі книжки з нагоди дня народження письменника
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="Block2">
            <div class="desktop">
                <h1>Пізнавайте світ книжок</h1>
                <div class="block2row">
                    <p>
                        “House of stories” надає можливість<br>створювати власну бібліотеку. Наша<br>книгарня вважає,
                        що оцінити людину<br>можна за тим, які книги вона читає,<br>адже кожна книга розкриває
                        людину<br>
                        різних сторін. В межах своєї книгарні ми<br>провели опитування, який відпочинок<br>люди вважають
                        найкращим, переважна<br>кількість відповіла, що вечір з книжкою і<br>горнятком ароматної кави не<br>
                        зрівняється ні з чим.
                    </p>
                    <div class="library">
                        <p>
                            Натисніть кнопку, щоб створити власну<br>електронну бібліотеку.
                        </p>
                        <button type="submit" class="gotocatalog"><a href="#!" class="cataloglink">Відкрити каталог</a>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="Block2_mobile">
            <div class="mobile">
                <h1>Пізнавайте світ книжок</h1>
                <div class="mobile_row2">
                    <p>
                        “House of stories” надає можливість створювати власну бібліотеку. В межах своєї книгарні ми
                        провели
                        опитування, який відпочинок люди вважають найкращим, переважна кількість відповіла, що вечір з
                        книжкою і горнятком ароматної кави не зрівняється ні з чим.
                    </p>
                    <button type="submit" class="gotocatalog"><a href="#!" class="cataloglink">Відкрити каталог</a>
                    </button>
                </div>
            </div>
        </section>

        <section class="Block3">
            <div class="desktop">
                <h1>Будьте сучасними</h1>
                <div class="block3row">
                    <p>
                        Завдяки технологіям відкрилась неймовірна кількість можливостей для людей. Зараз вам не треба
                        йти в книгарню і
                        купувати книжки, адже все це можна зробити в Інтернеті. Ви можете замовити книжку з доставкою
                        додому, або ж
                        просто придбати електронну книгу. “House of stories” вам пропонує широкий вибір як друкованих,
                        так і електронних
                        книжок. Так як ми підтримуємо позицію Опри Вафрі, ми вважаємо що книжки - перепустка в особисту
                        свободу, а тому
                        читач сам може вирішувати, яку літературу йому читати, та в якому форматі вона має бути. Наш
                        каталог постійно
                        оновлюється, а тому читач завжди знайде те, що хоче, зазвичай є дві варіації книги електронна та
                        друкована, проте
                        зараз в багатьох книгах з’являються і аудіокниги, в профейсійній озвучці, що дає змогу поринути
                        в книгу навіть під
                        час тренувань або прогулянок.
                    </p>
                </div>
                <div class="bookbuttons">
                    <button type="submit" class="top"><a href="#!" class="links">Найпопулярніші друковані книги</a>
                    </button>
                    <button type="submit" class="top"><a href="#!" class="links">Найпопулярніші електронні книги</a>
                    </button>
                    <button type="submit" class="top"><a href="#!" class="links">Найпопулярніші аудіокниги</a></button>
                </div>
            </div>
        </section>
        @include('layouts.footer')
        @endsection


    </main>

