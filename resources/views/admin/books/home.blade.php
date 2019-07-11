@extends('adminlte::page')

@section('content')
    <div class="container-fluid">


    <table id="books-table" class="table table-striped table-responsive-md btn-table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Quantidade de Paginas</th>
            <th>Editora</th>
            <th>Autor(es)</th>
         
        </tr>
        </thead>
        <tbody>
          
        @foreach ($books as $book)
        <tr>
        <td>{{$book->name}}</td>
        <td>{{$book->page_count}}</td>
        <td>{{$book->publishingCompany->name}}</td>   
        <td>
            @foreach($book->authors as $author)

                @if(!empty($author))
                {{$author->author_name}}
                @else
                    No Results
                @endif
            @endforeach
        </td>
        </tr>        
        @endforeach
        </tbody>
    
    </table>    

    </div>
    <script>
        window.onload = function(){
            $("#books-table").dataTable();
        }
    </script>
@endsection