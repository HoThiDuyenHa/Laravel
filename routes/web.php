<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\SumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentsController;
use Symfony\Component\Routing\RouterInterface;
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