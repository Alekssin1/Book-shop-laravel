<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog2;

class CatalogController extends Controller
{
    public function how(){
        return dd(Catalog2::join('author', 'catalog2.book_author', '=', 'author.id_author')
            ->get());
    }
}
