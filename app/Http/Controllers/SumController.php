<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SumController extends Controller{
    public function sum($num1,$num2){
            $num1+$num2;
    }
    public function calculator(Request $request){
        $sum=$request->number1+$request->number2;
        return  view('form',compact('sum'));
    }
}