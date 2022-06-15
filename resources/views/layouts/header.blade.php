<header class="header2">
    <div class="top_menu2">
        <img src="{{asset('img/svg/Logo_menu.svg')}}" alt="menu" class="menu_logo-pic">
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
            <a href="#!" class="menu_link"><img src="{{asset('img/svg/Cart3.svg')}}" alt="menu_images" class="menu_images"></a>
            <a href="{{ route("login") }}" class="menu_link"><img src="{{asset('img/svg/user.svg')}}" alt="menu_images" class="menu_images"></a>
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
