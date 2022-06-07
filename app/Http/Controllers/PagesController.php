<?php

namespace App\Http\Controllers;

use App\Models\Catalog2;
use Illuminate\Http\Request;

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
        }
        else{
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
        return view('pages.catalog', ['finded_books'=>$raw_results, 'finded_section'=>$request->Section]);
    }

    public function info($author, $name)
    {

        if (!empty($author) and !empty($name)) {
            $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
                ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
                ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
                ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
                ->whereRaw('book_name LIKE \'' . $name . '\''. "AND" . ' full_name LIKE \'' . $author . '\'')
                ->get();
        }
        return view('pages.info_page', ['found_book' => $raw_results])->with(['book_author' => $author,'book_name' => $name]) ;
    }

    public function characteristic($author, $name)
    {
        $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
            ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
            ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
            ->whereRaw('book_name LIKE \'' . $name . '\''. "AND" . ' full_name LIKE \'' . $author . '\'')
            ->get();
        return view('pages.Characteristic', ['found_book' => $raw_results])->with(['book_author' => $author,'book_name' => $name]) ;
    }

    public function author($author, $name)
    {
        $raw_results = Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->join('book_genre', 'catalog2.book_genre', '=', 'book_genre.id_genre')
            ->join('book_language', 'catalog2.book_language', '=', 'book_language.id_language')
            ->join('publishing_house', 'catalog2.publishing_house', '=', 'publishing_house.id_publishing')
            ->whereRaw('book_name LIKE \'' . $name . '\''. "AND" . ' full_name LIKE \'' . $author . '\'')
            ->get();
        return view('pages.about_author', ['found_book' => $raw_results])->with(['book_author' => $author,'book_name' => $name]) ;
    }


    public function search(Request $request)
    {
        $book= $request->book;
        return view('pages.search', ['data'=> Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
        ->whereRaw("`book_name` LIKE '%$book%' OR `full_name` LIKE '%$book%'")
        ->get()]);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.registration');
    }

    public function Landing()
    {
        return view('pages.Landing');
    }


}
