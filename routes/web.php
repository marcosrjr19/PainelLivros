<?php

use App\Authors;
use App\Books;
use App\Publishingcompany;
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

/*Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/teste',function(){
    $author = new Authors();
    $author =$author::create(['author_name' => 'MarcosAuthor']); /* Cria o Autor 

   $publishingcompany = new Publishingcompany();
   $publishingcompany = $publishingcompany::create(['name' => 'Abril']); /* Cria a editora 


    $book = new Books(); 
    $book->publishing_company_id = $publishingcompany->id;
    $book->name = 'NovoLivro';
    $book->page_count = 60; 
    $book->image_src = 'zero';
    $book->save(); /* Relaciona e Salva Tudo 

    $book->authors()->attach($author); /* Relaciona Livro/Autor; 

    exit();
       
     $book->authors()->save($book);
 


    
  // var_dump($author->authorID);
});*/

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', 'AdminController@index');

    route::get('/books', 'BooksController@index');

});

Route::get('/home', 'HomeController@index')->name('home');
