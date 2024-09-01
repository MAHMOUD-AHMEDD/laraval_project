<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',[AboutController::class,'index']);
Route::get('/users',[UsersController::class,'index']);
Route::get('/home',function (){
    return view('welcome');
});
Route::get('/products/{id}',function ($id){

echo $id;

})->where('id','[0-9]+');
Route::middleware(['checkuser'])->group(function (){

    Route::prefix('/dashboard')->group(function (){
        Route::get('/',function (){
            echo 'dashboard home';
        });
        Route::get('/orders',function (){
            echo 'dashboard orders';
        });

    });

});
Route::get('/ab',[HomeController::class,'index']);

Route::prefix('/contact')->group(function (){
    Route::get('/',[ContactController::class,'index']);
    Route::post('/submit',[ContactController::class,'save'])->name('contact.save');
});
Route::prefix('/users')->group(function (){
    Route::get('/',[UsersController::class,'base']);
    Route::post('/add',[UsersController::class,'register'])->name('users.reg');
});
