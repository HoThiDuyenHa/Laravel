<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\SumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentsController;

use App\Http\Controllers\ApiController;
use Symfony\Component\Routing\RouterInterface;

// VIEW PRODUCTS 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Products2Controller;

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomePageController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/welcome',function(){
        return 'Chào mừng đến với PNV';
});
Route::get('/index',[MyController::class,'index']);

Route::get('/sum',function(){
    return view('form');
});
Route::post('/sum',[SumController::class,'calculator'])->name('summary');

// Route::group(['prefix'=>'tutoral'],function(){
//     Route::get('/aws'.function(){
//         echo "aws tutalria";
//     });
//     Route::get('/jira',function(){
//         echo "jira tutalria";
//     });

//     Route::get('/testng', function(){
//         echo "testng tutalria";
//     });

// });

Route::get('/post',[PostController::class,'index']);

Route::get('create',[PostController::class,'create']);

Route::resource('/post',PostController::class);


Route::get('/students',[StudentsController::class,'index']);


Route::post('/students',[StudentsController::class,'displayInfor']);

Route::get('/exciseAPI',[ApiController::class,'getData']);

Route::get('/data',function(){
    return view('formRoom');
});


Route::resource('products', ProductController::class);

Route::get('/exciseAPI2',[Products2Controller::class,'index']);

Route::get('/indexhtml',function(){
    return view('index');
});


// Route::get('/indexhtml',['as'=>'trang-chu','uses'=>'PgeController@getIndex']);
  Route::get('/indexhtml',[PageController::class,'getIndex']);

Route::get('/shopee',[HomePageController::class,'getindex']);


//Tạo bảng 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Route::get('database', function () {
    Schema::create('loaisanpham', function (Blueprint $table) {
        $table->id(); 
        $table->string('ten', 200); 
        $table->timestamps(); 
    });

    return "Đã thực hiện lệnh tạo bảng thành công";
});

use App\Http\Controllers\CreatetableController;
Route::get('/createtable',[CreatetableController::class,'table']);

use App\Http\Controllers\PageeController;
Route::get('Pagee',[PageeController::class,'getIndex']);