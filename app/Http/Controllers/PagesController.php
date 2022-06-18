<?php

namespace App\Http\Controllers;

use App\Models\Catalog2;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\registration;

class PagesController extends Controller
{
    public function index()
    {
        $array = array(date(DATE_RFC2822), $_POST['email'], $_POST['password']);
        return view('pages.index')->with('array', $array);
    }

    public function catalog(Request $request)
    {
        if (empty($request->PublishHouse) and (empty($request->Price) or intval($request->Price[1]) == 0) and
            (empty($request->Language)) and (empty($request->Section))) {
            $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
                ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
                ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
                ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
                ->get();
        } else {
            $lower_price = intval(htmlspecialchars($request->Price[0]));
            $upper_price = intval(htmlspecialchars($request->Price[1]));
            $sql = array('0');
            $sql_publish = array('0');
            $sql_language = array('0');
            $sql_section = array('0');
            if (isset($request->PublishHouse)) {
                foreach ($request->PublishHouse as $word) {
                    $sql_publish[] = 'publishing_house.house_name LIKE \'' . $word . '\'';
                }
            }
            if (isset($request->Language)) {
                foreach ($request->Language as $word) {
                    $sql_language[] = 'language LIKE \'' . $word . '\'';
                }
            }
            if (isset($request->Section)) {
                foreach ($request->Section as $word) {
                    $sql_section[] = 'name LIKE \'' . $word . '\'';
                }
            }
            $sql_publish = implode(" OR ", $sql_publish);
            $sql_language = implode(" OR ", $sql_language);
            $sql_section = implode(" OR ", $sql_section);
            $publisher = strlen($sql_publish);
            $language = strlen($sql_language);
            $section = strlen($sql_section);
            $sql = '';
            if ($publisher > 1 and ($language > 1 or $section > 1 or $upper_price > 1)) {
                $sql = $sql . '(' . $sql_publish . ") AND ";
            } else if ($publisher > 1) {
                $sql = $sql . $sql_publish;
            }
            if ($language > 1 and ($section > 1 or $upper_price > 1)) {
                $sql = $sql . '(' . $sql_language . ") AND ";
            } else if ($language > 1) {
                $sql = $sql . '(' . $sql_language . ')';
            }
            if ($section > 1 and ($upper_price > 1)) {
                $sql = $sql . '(' . $sql_section . ') AND ';
            } else if ($section > 1) {
                $sql = $sql . '(' . $sql_section . ')';
            }


            if ($upper_price > 1) {
                $sql = $sql . '(book_price BETWEEN ' . $lower_price . ' AND ' . $upper_price . ')';
            }
            $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
                ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
                ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
                ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
                ->whereRaw($sql)
                ->get();
        }
        $cart = new Cart();
        $books_check = [];
        if (session('user')!=null) {
            $check = $cart->where('id_user', '=', session('user')['id'])->get();
            foreach ($check as $book) {
                array_push($books_check, $book["id_book"]);
            }
        }
        $wishlist = new Wishlist();
        $wishlist_check = [];
        if (session('user')!=null) {
            $check_wishlist = $wishlist->where('id_user', '=', session('user')['id'])->get();
            foreach ($check_wishlist as $book) {
                array_push($wishlist_check, $book["id_book"]);
            }
        }
        return view('pages.catalog', ['finded_books' => $raw_results, 'finded_section' => $request->Section, 'books_check' => $books_check, 'wishlist_check'=> $wishlist_check]);
    }

    public function info($author, $name)
    {

        if (!empty($author) and !empty($name)) {
            $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
                ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
                ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
                ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
                ->whereRaw('book_name LIKE \'' . $name . '\'' . "AND" . ' full_name LIKE \'' . $author . '\'')
                ->get();
            $cart = new Cart();
            $books_check = [];
            if (session('user')!=null) {
                $check = $cart->where('id_user', '=', session('user')['id'])->get();
                foreach ($check as $book) {
                    array_push($books_check, $book["id_book"]);
                }
            }
            $wishlist = new Wishlist();
            $wishlist_check = [];
            if (session('user')!=null) {
                $check_wishlist = $wishlist->where('id_user', '=', session('user')['id'])->get();
                foreach ($check_wishlist as $book) {
                    array_push($wishlist_check, $book["id_book"]);
                }
            }
        }

        return view('pages.info_page', ['found_book' => $raw_results, 'books_check' => $books_check, 'wishlist_check' => $wishlist_check])->with(['book_author' => $author, 'book_name' => $name]);
    }

    public function characteristic($author, $name)
    {
        $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
            ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
            ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
            ->whereRaw('book_name LIKE \'' . $name . '\'' . "AND" . ' full_name LIKE \'' . $author . '\'')
            ->get();
        return view('pages.Characteristic', ['found_book' => $raw_results])->with(['book_author' => $author, 'book_name' => $name]);
    }

    public function author($author, $name)
    {
        $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
            ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
            ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
            ->whereRaw('book_name LIKE \'' . $name . '\'' . "AND" . ' full_name LIKE \'' . $author . '\'')
            ->get();
        return view('pages.about_author', ['found_book' => $raw_results])->with(['book_author' => $author, 'book_name' => $name]);
    }

    public function author_books($author, $name)
    {
        $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
            ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
            ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
            ->whereRaw('full_name LIKE \'' . $author . '\'' . "AND" . ' book_name  <> \'' . $name . '\'')
            ->get();
        $cart = new Cart();
        $books_check = [];
        if (session('user')!=null) {
            $check = $cart->where('id_user', '=', session('user')['id'])->get();
            foreach ($check as $book) {
                array_push($books_check, $book["id_book"]);
            }
        }
        $wishlist = new Wishlist();
        $wishlist_check = [];
        if (session('user')!=null) {
            $check_wishlist = $wishlist->where('id_user', '=', session('user')['id'])->get();
            foreach ($check_wishlist as $book) {
                array_push($wishlist_check, $book["id_book"]);
            }
        }
        return view('pages.author_book', ['found_books' => $raw_results, 'books_check' => $books_check , 'wishlist_check' => $wishlist_check])->with(['book_author' => $author, 'book_name' => $name]);
    }


    public function search(Request $request)
    {
        $book = $request->book;
        $cart = new Cart();
        $books_check = [];
        if (session('user')!=null) {
            $check = $cart->where('id_user', '=', session('user')['id'])->get();
            foreach ($check as $bookin) {
                array_push($books_check, $bookin["id_book"]);
            }
        }
        $wishlist = new Wishlist();
        $wishlist_check = [];
        if (session('user')!=null) {
            $check_wishlist = $wishlist->where('id_user', '=', session('user')['id'])->get();
            foreach ($check_wishlist as $bookin) {
                array_push($wishlist_check, $bookin["id_book"]);
            }
        }
        return view('pages.search', ['data' => Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->whereRaw("`book_name` LIKE '%$book%' OR `full_name` LIKE '%$book%'")
            ->get(), 'books_check'=>$books_check, 'wishlist_check'=>$wishlist_check]);
    }

    public function login(Request $request)
    {
        $reg = new registration();
        if ($reg->where('email', '=', $request->input('email'))->where('password', '=', md5($request->input('password')))->doesntExist()) {
            return 'Введені некоректні данні';
        }
        $sectionUser = $reg::where('email', '=', $request->input('email'))->where('password', '=', md5($request->input('password')))->get()[0];
        session(['user' => [
            'id' => $sectionUser->id,
            'username' => $sectionUser->username,
            'usersurname' => $sectionUser->usersurname,
            'email' => $sectionUser->email
        ]]);
        return redirect()->route('catalog');
    }

    public function exit()
    {
        session(['user' => null]);
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        $reg = new registration();
        $reg->username = $request->input('username');
        $reg->usersurname = $request->input('usersurname');
        $reg->email = $request->input('email');
//        if (empty($request->input('username'))){
//            array_push($errors, "Name is required");
//        }
//        if (empty($request->input('usersurname'))){
//            array_push($errors, "Surname is required");
//        }
//        if (empty($request->input('email'))){
//            array_push($errors, "Email is required");
//        }
//        if (empty($request->input('password_1'))){
//            array_push($errors, "Password is required");
//        }

//        if ($reg->input('password_1') != $reg->input('password_2')){
//            array_push($errors, "The two passwords do not match")
//        }
        $reg->password = md5($request->input('password_1'));
        $reg->save();
        return redirect()->route('login');
//        return view('pages.registration');
    }

    public function Landing()
    {
        return view('pages.Landing');
    }

    public function cart()
    {
        $cart = new Cart();
        $books = $cart->where('id_user', '=', session('user')['id'])->get();
        $books_in_cart = [];
        $total_price = 0;
        foreach ($books as $book) {
            array_push($books_in_cart, $book["id_book"]);
            $total_price += (int)$book['quantity'] * (int)Catalog2::select('book_price')->where('id', '=', $book["id_book"])->get()[0]->book_price;
        }
        $info_books = [];
        foreach ($books_in_cart as $book_in_cart) {
            array_push($info_books, Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
                ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
                ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
                ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
                ->where('id', '=', $book_in_cart)
                ->get());
        }
        return view('pages.cart', ['data' => $info_books, 'info' => $books, 'total_price' => $total_price]);
    }

    public function add_cart($book_id)
    {
        $cart = new Cart();
        $cart->id_user = session('user')['id'];
        $cart->id_book = $book_id;
        $cart->save();
        return redirect()->route('cart');
    }

    public function quantity($number, Request $request)
    {
        $cart = new Cart();
        $cart->where('id_user', '=', session('user')['id'])->where('id_book', '=', $number)->update(["quantity" => $request->input('book_num')]);
        return redirect()->route('cart');
    }

    public function delete_from_cart($number)
    {
        $cart = new Cart();
        $cart->where('id_user', '=', session('user')['id'])->where('id_book', '=', $number)->delete();
        return redirect()->route('cart');
    }

    public function buy()
    {
        $cart = new Cart();
        $cart->where('id_user', '=', session('user')['id'])->delete();
        return view("pages.successful_payment");
    }

    public function wishlist()
    {
        $wishlist = new Wishlist();
        $books = $wishlist->where('id_user', '=', session('user')['id'])->get();
        $books_in_cart = [];
        foreach ($books as $book) {
            array_push($books_in_cart, $book["id_book"]);
        }
        $info_books = [];
        foreach ($books_in_cart as $book_in_cart) {
            array_push($info_books, Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
                ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
                ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
                ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
                ->where('id', '=', $book_in_cart)
                ->get());
        }
        $cart = new Cart();
        $books_check = [];
        if (session('user')!=null) {
            $check = $cart->where('id_user', '=', session('user')['id'])->get();
            foreach ($check as $book) {
                array_push($books_check, $book["id_book"]);
            }
        }
        $wishlist_check = [];
        if (session('user')!=null) {
            $check_wishlist = $wishlist->where('id_user', '=', session('user')['id'])->get();
            foreach ($check_wishlist as $book) {
                array_push($wishlist_check, $book["id_book"]);
            }
        }
        return view('pages.wishlist', ['data' => $info_books, 'info' => $books, 'books_check'=>$books_check, 'wishlist_check'=>$wishlist_check]);
    }

    public function add_wishlist($book_id)
    {
        $wishlist = new Wishlist();
        $wishlist->id_user = session('user')['id'];
        $wishlist->id_book = $book_id;
        $wishlist->save();
        return redirect()->route('wishlist');
    }

    public function delete_from_wishlist($number)
    {
        $wishlist = new Wishlist();
        $wishlist->where('id_user', '=', session('user')['id'])->where('id_book', '=', $number)->delete();
        return redirect()->route('wishlist');
    }

}
