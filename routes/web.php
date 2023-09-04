<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('admin')->group(function (){
    Route::view('/','home')->name('home')->withoutMiddleware('admin');
    Route::view('/about','about')->name('about');
    Route::view('/contact','contact')->name('contact');
});

Route::get('/string',function (){
    $result=\Illuminate\Support\Str::plural("hello");
    echo $result;
});


//students crud

Route::controller(\App\Http\Controllers\StudentController::class)->group(function (){
   Route::get('/students','index')->name('student.index');
   Route::get('/students/create','create')->name('student.create');
   Route::post('/students/store','store')->name('student.store');
    Route::get('/students/show/{id}','show')->name('student.show');
    Route::get('/students/edit/{id}','edit')->name('student.edit');
    Route::post('/students/update/{id}','update')->name('student.update');
    Route::get('/students/destroy/{id}','destroy')->name('student.destroy');
});
