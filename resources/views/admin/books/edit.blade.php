
@extends('adminlte::page')
@section('content')
    <div class="container-fluid">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="row alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="btn-group">
                <a href="{{url('/admin/books')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
        </div>
               
       
            <form enctype="multipart/form-data" method="POST" action="{{route('books.update', ['id' => $book->id])}}">
                <input name="_method" type="hidden" value="PUT">

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="book_name">Nome do Livro</label>
                        <input type="text" class="form-control" name="book_name" value="{{$book->name}}" id="book_name" placeholder="Ex : Senhor dos Anéis">
                    </div>
                    <div class="form-group">
                            <label for="page_count">Quantidade de Páginas</label>
                            <input type="number" name="page_count" min="1" class="form-control" value="{{$book->page_count}}" placeholder="Total de páginas do livro" id="page_count">
                        </div>
                    <div class="form-group">
                        <label for="publishing_company">Editora</label>
                        <select name="publishing_company" id="publishing_company" class="form-control">
                        <option selected value="{{$book->publishingCompany->id}}">{{$book->publishingCompany->name}}</option>
                    
                            @foreach ($publishingCompany as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                           @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book-author">Autor(es)</label>   
                        <select class="form-control" id="book-authors" name="authors[]" multiple="multiple">
                            @foreach ($book->authors as $author)
                            <option selected value="{{$author->id}}">{{$author->author_name}}</option>
                            @endforeach
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}">{{$author->author_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="book_img">Imagem da capa do livro</label>
                            <input type="file" class="form-control-file" id="book_img" name="book_img" accept="image/*">
                            <small id="imgHelp" class="form-text text-muted">
                                A Imagem para o livro é opcional
                            </small>
                    </div>
                    <div>
                        @if(!empty($book->image_src))
                        <img src="{{Storage::url($book->image_src)}}" class="img-fluid"/>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>
   
    <script>
        window.onload = function(){
            $('#book-authors').select2({
                placeholder : "Selecione ao menos um autor",
                width : '100%'
            });
        }
    </script>

@endsection