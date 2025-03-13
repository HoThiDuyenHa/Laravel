<?php

namespace App\Http\Controllers;

// use App\Models\News;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
// use App\Models\News;
class PageeController extends Controller
{
    public function getIndex() {
        // Cách 11
        // $slide = Slide::all();
        // $products = Product::where('id_type', 6)->limit(4)->get();
        // $product2 = Product::where('id_type', 5)->limit(4)->get();
        // $product3 = Product::where('id_type', 4)->limit(4)->get(); 

        // return view('page.trangchu', compact('slide', 'products', 'product2', 'product3'));

            $slide = Slide::all();
            $new_product=Product::where('new',1)->paginate(4);
            $promotion_product=Product::where('promotion_price','<>',0)->paginate(8);
            return view('page.trangchu', compact('slide', 'new_product', 'promotion_product'));

    }
    public function getLoaiSp($type)
	{
	$sp_theoloai = Product::where('id_type', $type)->get();
	$type_product =TypeProduct::all();
	$sp_khac = Product::where('id_type', '<>', $type)->paginate(4);
	
	return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
	}
}
