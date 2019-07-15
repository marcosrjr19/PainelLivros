<?php


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::group(['prefix' => 'admin',  'middleware' => ['role.verify', 'auth']], function () {


    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::resource('authors', 'AuthorsController');

    Route::resource('books', 'BooksController');

    Route::resource('publishingcompany', 'PublishingCompanyController');

    Route::resource('users-roles', 'UsersRolesController');

    Route::resource('banners', 'BannersController');

});
