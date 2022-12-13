<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashbord', [App\Http\Controllers\Admin\DashbordController::class,'index'])->name('admin_dashbord');
    //category routes
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category.index');
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class,'create'])->name('category.create');
    Route::post('/category', [App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');


});




// Route::get('/test', function () {
//     return view('admin.dashbord');
// });
