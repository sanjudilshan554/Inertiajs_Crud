<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
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

Route::get("/",[HomeController::class,"index"])->name("home");


// creating routerprefix 
Route::prefix('/todo')->group(function () {
    Route::get('/',[TodoController::class,'index'])->name("Todo.index");
    Route::post('/store',[TodoController::class,'store'])->name('Todo.store');
    Route::get('/data',[TodoController::class,'data'])->name('data');
    Route::get('{task_id}/delete',[TodoController::class,'delete'])->name('todo.delete');
    Route::get('{task_id}/edit',[TodoController::class,'edit'])->name('todo.edit');
    Route::post('{task_id}/update',[TodoController::class,'update'])->name('todo.update');
    Route::post('{task_id}/status',[TodoController::class,'status'])->name('todo.status');
});


require __DIR__.'/auth.php';
