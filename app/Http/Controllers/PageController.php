<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getindex(){
        return view('page.trangchu');
    }
}
