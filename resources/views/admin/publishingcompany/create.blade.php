
@extends('adminlte::page')
@section('content')
    <div class="container-fluid">

        <div class="btn-group">
                <a href="{{url('/admin/publishingcompany')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
        </div>
               
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

            <form method="POST" action="{{route('publishingcompany.store')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="publishing_name">Nome da Editora</label>
                        <input type="text" class="form-control" name="publishing_name" id="publishing_name" >
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>

@endsection