@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-lg-2">
        <a href="{{url('/admin/dashboard')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
        </div>
        <div class="col-xs-6 col-lg-2">
        <a href="{{url('/admin/books/new')}}"><button type="button" class="btn-block btn btn-success">Adicionar Novo</button></a>
        </div>
      
          
    </div>
   

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
            $("#books-table").dataTable({
                "lengthMenu" : false,
                "lengthChange" : false,
                "language": {
            "zeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
            });
        }
    </script>
@endsection