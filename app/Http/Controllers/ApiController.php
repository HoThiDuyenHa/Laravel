<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData(){
        $response=Http::get('https://jsonplaceholder.typicode.com/posts');
        $data=$response->json();
        return view('exciseAPI')->with('data',$data);
    }
}