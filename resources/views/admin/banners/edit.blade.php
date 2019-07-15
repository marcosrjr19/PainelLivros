
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
                <a href="{{url('/admin/authors')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
        </div>
               
            <form method="POST" action="{{route('authors.update', ['id' => $author->id])}}">
                <input name="_method" type="hidden" value="PUT">

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="book_name">Nome do Autor</label>
                        <input type="text" class="form-control" name="author_name" value="{{$author->author_name}}" id="author_name">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>

@endsection