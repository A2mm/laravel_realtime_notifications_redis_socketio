<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    // admin security section 
	Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
    {
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard')->middleware('auth');
	Route::get('/register', 'AdminController@register')->name('admin.register')->middleware('guest');
  Route::get('/login', 'AdminController@login')->name('admin.login')->middleware('guest');
	Route::post('/postRegister', 'AdminController@postRegister')->name('admin.postRegister')
	                                                            ->middleware('guest');
    Route::post('/postLogin', 'AdminController@postLogin')->name('admin.postLogin')
                                                          ->middleware('guest');   
    Route::get('/logout', 'AdminController@postLogout')->name('admin.logout')
                                                          ->middleware('auth'); 
    });
    // admin security section 
    
    // books section 
    Route::group(['namespace' => 'Books'], function()
    {
       Route::get('/all/books', 'BookController@index')->name('books.all');
       Route::get('/add/new/book', 'BookController@create')->name('books.create');
       Route::post('/save/new/book', 'BookController@save')->name('books.save');
       Route::get('/edit/book/{id}', 'BookController@edit')->name('books.edit');
       Route::get('/show/book/{id}', 'BookController@getDetails')->name('books.show');
       Route::post('/update/book', 'BookController@update')->name('books.update');
       Route::get('/delete/book/{id}', 'BookController@delete')->name('books.delete');
    });
     // books section 
});