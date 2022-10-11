<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin',[OrderItemsController::class,'dashboard'] )->middleware(['adminauth']);

Route::get('/categories', [CategoryController::class,'index'])->middleware(['adminauth']);

Route::get('/categories/create', [CategoryController::class,'create'])->middleware(['adminauth']);

Route::post('/categories', [CategoryController::class,'store'])->middleware(['adminauth']);

Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->middleware(['adminauth']);

Route::put('/categories/{category}', [CategoryController::class,'update'])->middleware(['adminauth']);

Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->middleware(['adminauth']);

/////////////////////////

Route::get('/foods', [FoodController::class,'index'])->middleware(['adminauth']);

Route::get('/foods/create', [FoodController::class,'create'])->middleware(['adminauth']);

Route::post('/foods', [FoodController::class,'store'])->middleware(['adminauth']);

Route::get('/foods/{food}/edit', [FoodController::class,'edit'])->middleware(['adminauth']);

Route::put('/foods/{food}', [FoodController::class,'update'])->middleware(['adminauth']);

Route::delete('/foods/{food}', [FoodController::class,'destroy'])->middleware(['adminauth']);

///////////////////////

Route::get('/admin/orders', [OrderItemsController::class,'notacceptedorders'])->middleware(['adminauth']);

Route::get('/acceptorder/{order}', [OrderItemsController::class,'acceptorder'])->middleware(['adminauth']);

Route::get('/acceptedorders', [OrderItemsController::class,'acceptedorders'])->middleware(['adminauth']);

Route::get('/outfordelivery/{order}', [OrderItemsController::class,'outfordelivery'])->middleware(['adminauth']);

Route::get('/delivered/{order}', [OrderItemsController::class,'delivered'])->middleware(['adminauth']);

Route::get('/reject/{order}', [OrderItemsController::class,'delivered'])->middleware(['adminauth']);


//////////////////////

Route::get('/', [UserController::class,'show'])->middleware('auth');

Route::get('/food', [UserController::class,'showfoods'])->middleware('auth');

Route::get('/category', [UserController::class,'showcategories'])->middleware('auth');

Route::get('/category/{category}', [UserController::class,'showcategoryfood'])->middleware('auth');

Route::post('/search', [UserController::class,'search'])->middleware('auth');

Route::get('/ordersinfo', [UserController::class,'ordersinfo'])->middleware('auth');

/////////////////////////


Route::get('/register', [UserAuthController::class,'create']);

Route::post('/users', [UserAuthController::class,'store']);

Route::post('/logout', [UserAuthController::class,'logout']);

Route::get('/login', [UserAuthController::class,'login'])->name('login');

Route::post('/users/authenticate', [UserAuthController::class,'authenticate']);


//////////////////////////

Route::get('/addtocart/{food}', [BagController::class,'create'])->middleware('auth');

Route::get('/cart', [BagController::class,'showcart'])->middleware('auth');

Route::get('/removefromcart/{food}', [BagController::class,'remove'])->middleware('auth');

/////////////////////////////

Route::get('/order', [OrderItemsController::class,'order'])->middleware('auth');

Route::get('/admins/authenticate', [AdminController::class,'showAdminLoginForm'])->name('loginadmin');

Route::post('/admins/login', [AdminController::class,'adminLogin']);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/admins/register', [AdminController::class,'create']);
Route::post('/admin/register/auth', [AdminController::class,'store']);

Route::post('/admin/logout', [AdminController::class,'logout']);
