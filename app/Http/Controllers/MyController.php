<?php

namespace App\Http\Controllers;
class MyController extends Controller{
    public function index(){
        $name="My name is Duyen Ha";
        $hometown="I'm from Quang Tri province";
        return view('test')->with(['name'=>$name,'home'=>$hometown]);
    }
}