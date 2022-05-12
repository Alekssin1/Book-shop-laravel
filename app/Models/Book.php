<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'catalog';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $connection = 'MySQL';
    protected $attributes = [
        'book_translator' => null,
        'book_series' => null,
    ];

}
