<header class="header2">
    <div class="top_menu2">
        <a href="{{ action([\App\Http\Controllers\PagesController::class, 'Landing']) }}"><img src="{{asset('img/svg/Logo_menu.svg')}}" alt="menu" class="menu_logo-pic"></a>
        <img src="{{asset('img/svg/mobile_logo.svg')}}" alt="menu" class="menu_logo-pic_mobile">
        <form action="{{ action([\App\Http\Controllers\PagesController::class, 'search']) }}" method="GET">
            @csrf
            <div class="SearchMenu">
                <div class="searchBarmenu">
                    <div class="search">
                        <input type="search" id="site-search" name="book">
                    </div>
                    <div class="searchButtonmenu">
                        <button type="submit"><i class="fa fa-search"></i>Знайти</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="menu_links">
            <a href="#!" class="menu_link"><img src="{{asset('img/svg/wish list.svg')}}" alt="menu_images" class="menu_images"></a>
            <a href="{{ route('cart')  }}" class="menu_link"><img src="{{asset('img/svg/Cart3.svg')}}" alt="menu_images" class="menu_images"></a>
            <button onclick="myFunction()" class="dropbtn"><img src="{{asset('img/svg/user.svg')}}" alt="menu_images" class="menu_images"></button>
            <div id="myDropdown" class="dropdown-content">
                @if (isset(session('user')['username']))
                    <a href="{{ route("exit") }}" class="menu_link">{{session('user')['username']}} {{session('user')['usersurname']}}<br><br>Вийти з аккаунту</a>
                @else
                    <a href="{{ route("login") }}" class="menu_link">Створити аккаунт<br>або<br>зайти в уже існуючий</a>
                @endif
            </div>
            <script>
                /* When the user clicks on the button,
                toggle between hiding and showing the dropdown content */
                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn').matches('.menu_images')) {

                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
        </div>
    </div>
</header>

<header class="header2_mobile">
    <div class="top_menu_mobile">
        <a href="#" onclick="history.back();"><img src="{{asset('img/svg/arrow left.svg')}}"></a>

        <input type="checkbox" class="checkbox1" id="checkbox1" name="checkbox1" value="yes">
        <label for="checkbox1" class="checkbox_label">
            <img src="{{asset('img/svg/menu.svg')}}" class="list_menu_mobile">
        </label>
        <div class="button_menu">
            <a href="{{ route("login") }}">Моя сторінка</a>
            <a href="#!">Список бажаного</a>
            <a href="#!">Корзина</a>
        </div>
    </div>
</header>
