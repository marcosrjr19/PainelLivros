<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Publishingcompany;
use App\Authors;
use App\Http\Requests\BookStoreRequest;
use App\Traits\UploadTrait;

class BooksController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.books.home')->with('books' , Books::with('authors','publishingcompany')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 
        view('admin.books.create')->with('authors', Authors::all())->with('publishingCompany', Publishingcompany::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {

        $request->validated();

        $book = new Books(); 
        $book->publishing_company_id = $request->input('publishing_company');
        $book->name = $request->input('book_name');
        $book->page_count = $request->input('page_count'); 
        
        if($request->has('book_img')){

            $image = $request->file('book_img');
            $name = uniqid('img_');
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            
            $book->image_src = $filePath;
        }
       $book->save(); 

       foreach($request->input('authors') as $author){      
         
            $book->authors()->attach(Authors::find($author)); /* Relaciona Livro/Autor;*/
       }

      
       return redirect()->back()->with('message', 'Livro salvo com sucesso !');
      
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
