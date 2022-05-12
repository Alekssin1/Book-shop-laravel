<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        $array = array(date(DATE_RFC2822), $_POST['email'], $_POST['password']);
        return view('pages.index')->with('array', $array);
    }

    public function catalog()
    {
        return view('pages.catalog');
    }

    public function info($author, $name)
    {
        return view('pages.info_page')->with(['book_author' => $author,'book_name' => $name]) ;
    }

    public function search()
    {
        return view('pages.search');
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
