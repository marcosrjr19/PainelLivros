<?php

use Illuminate\Database\Seeder;
use App\Books;
use App\Publishingcompany;
use App\Authors;


class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book_1 = new Books();
        $book_1->name = 'Harry Potter e a Camara Secreta';
        $book_1->page_count = 500;
        $book_1->image_src = 'uploads/images/books/capa1.jpg';
        $book_1->publishing_company_id = 1;
        $book_1->save();
        $book_1->authors()->attach(Authors::where("author_name", "JK Rowling")->first());

        $book_2 = new Books();
        $book_2->name = 'Harry Potter e o Prisioneiro de Azkaban';
        $book_2->page_count = 500;
        $book_2->image_src = 'uploads/images/books/capa2.jpg';
        $book_2->publishing_company_id = 1;
        $book_2->save();
        $book_2->authors()->attach(Authors::where("author_name", "JK Rowling")->first());

        $book_3 = new Books();
        $book_3->name = 'A fabula do livro azul';
        $book_3->page_count = 500;
        $book_3->image_src = 'uploads/images/books/capa3.jpg';
        $book_3->publishing_company_id = 2;
        $book_3->save();
        $book_3->authors()->attach(Authors::where("author_name", "Machado de Assis")->first());
    

    }
}
