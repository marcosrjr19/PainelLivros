<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publishingcompany;
use App\Http\Requests\PublishingCompanyRequest;
use App\Books;

class PublishingCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.publishingcompany.home')->with('publishingCompany', Publishingcompany::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishingcompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublishingCompanyRequest $request)
    {
        $validated = $request->validated();

        Publishingcompany::create(['name' => $request->input('publishing_name')]);

        return
        redirect()
       ->back()
       ->with('message', 'Editora salva com sucesso !'); 
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
        $publishingcompany = Publishingcompany::findOrFail($id);

        return view('admin.publishingcompany.edit')->with('publishingcompany' , $publishingcompany);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublishingCompanyRequest $request,$id)
    {
        $validated = $request->validated();

        $publishingcompany = Publishingcompany::findOrFail($id);
        $publishingcompany->name = $request->input('publishing_name');
        $publishingcompany->save();

        return
        redirect()
       ->back()
       ->with('message', 'Editora atualizada com sucesso !'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publishingcompany = Publishingcompany::firstOrFail($id);

        $books = Books::with('authors','publishingcompany')->where('publishing_company_id', '=', $id )->get();

        foreach($books as $book){

            if(!$book->authors->isEmpty()){
                $book->authors()->sync([]);
                $book->delete();
            }

        }
        $publishingcompany->delete();

        return redirect()->back()->with('message', 'Editora Excluida com sucesso!');
    }
}
