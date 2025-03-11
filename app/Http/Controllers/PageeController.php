<?php

namespace App\Http\Controllers;

// use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
// use App\Models\News;
class PageeController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
        $products = Product::where('id_type', 6)->limit(4)->get();
        $product2 = Product::where('id_type', 5)->limit(4)->get();
        $product3 = Product::where('id_type', 4)->limit(4)->get(); 

        return view('page.trangchu', compact('slide', 'products', 'product2', 'product3'));
    }
    
    
}
