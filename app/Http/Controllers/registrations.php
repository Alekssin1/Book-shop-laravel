<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;

class registrations extends Controller
{
    public function registration(){
        $obj = new registrations();
        dd($obj->all());
    }
}
