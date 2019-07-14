<?php

namespace App\Http\Controllers;
use App\Authors;
use App\Books;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorsStoreRequest;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.authors.home')->with('authors' , Authors::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsStoreRequest $request)
    {
        $request->validated();

        Authors::create(['author_name' => $request->input('author_name')]);

        return
        redirect()
       ->back()
       ->with('message', 'Autor salvo com sucesso !'); 
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Authors::findOrFail($id);

        return view('admin.authors.edit')->with('author' , $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsStoreRequest $request, $id)
    {
        $request->validated();

        $author = Authors::findOrFail($id);
        $author->author_name = $request->input('author_name');
        $author->save();

        return
        redirect()
       ->back()
       ->with('message', 'Autor atualizado com sucesso !'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Authors::findOrFail($id);
        $books = $author->books()->get();
        
       foreach ($books as $book) {
           $book_authors = $book->authors()->get();

           if($book_authors->count() === 1 && $book_authors->first()->id == $id){

               $book->authors()->detach($id);
               $book->delete();

           }else{
               $book->authors()->detach($id);
           }

       }
       $author->delete();

    }
}
