<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function (){
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index']);
        Route::get('user',[MainController::class,'member'])->name('member');

        #menu
        Route::prefix('menus')->group(function (){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::delete('destroy',[MenuController::class,'destroy']);


        });

        #Product
        Route::prefix('products')->group(function (){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::delete('destroy',[ProductController::class,'destroy']);

        });

        #Slider
        Route::prefix('sliders')->group(function (){
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::delete('destroy',[SliderController::class,'destroy']);

        });

        #Upload
        Route::post('upload/services',[UploadController::class,'store']);

    });
});


Route::get('homes',[HomeController::class,'index']);
Route::post('/services/load-product',[HomeController::class,'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html',[CategoryController::class,'index']);
