<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Banner;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('books', Books::with('authors', 'publishingcompany')->orderBy('id', 'ASC')->get())
        ->with('banners', Banner::all());
    }
}
