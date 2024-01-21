<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibraryController;

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
    return view('login');
});

// Route for Login and Registration
Route::controller(UserController::class)->group(function (){
    Route::get('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/checkLogin', 'checkLogin')->name('checkLogin');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function (){
    // Route for Library
    Route::controller(LibraryController::class)->group(function() {
        Route::name('library.')->group(function(){
            Route::get('/library/dashboard', 'dashboard')->name('dashboard');
            Route::get('/library/book', 'book')->name('book');
            Route::get('/library/bookGenre', 'bookGenre')->name('bookGenre');
            Route::post('/library/addBook', 'addBook')->name('addBook');
            Route::put('/library/{book}/updateBook', 'updateBook')->name('updateBook');
            Route::delete('/library/{book}/deleteBook', 'deleteBook')->name('deleteBook');
        });
    });


});
