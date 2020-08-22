<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('/login/admin');
})->name('logiut');

Route::get('/login/admin', 'Auth\LoginController@index');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');


Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // Route::resource('blog', 'Admin\BlogController');
});