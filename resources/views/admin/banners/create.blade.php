
@extends('adminlte::page')
@section('content')
    <div class="container-fluid">

        <div class="btn-group">
                <a href="{{url('/admin/banners')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
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

            <form method="POST" enctype="multipart/form-data" action="{{route('banners.store')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="author_name">Selecione os Banners</label>
                        <p><small>Mais de um banner pode ser selecionado de uma vez, eles serão redimensionados para 825x320</small></p>
                        <input type="file" name="banners[]" multiple accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>

@endsection