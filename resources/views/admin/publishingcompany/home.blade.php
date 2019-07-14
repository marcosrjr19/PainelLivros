@extends('adminlte::page')

@section('content')
    <div class="container-fluid">

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

    <div class="row">
        <div class="col-xs-6 col-lg-2">
        <a href="{{url('/admin/dashboard')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
        </div>
        <div class="col-xs-6 col-lg-2">
        <a href="{{route('publishingcompany.create')}}"><button type="button" class="btn-block btn btn-success">Adicionar Novo</button></a>
        </div>
      
          
    </div>
   

    <table id="authors-table" class="table table-striped table-responsive-md btn-table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Modificar</th>
            <th>Remover</th>
         
        </tr>
        </thead>
        <tbody>
          
        @foreach ($publishingCompany as $company)
        <tr>
        <td>{{$company->name}}</td>
        <td><a href="{{route('publishingcompany.edit', ['id' => $company->id])}}"><button class="btn btn-warning"><i class="fa fa-fw fa-edit"></i></button></a></td>
        <td>
            <form method="POST" action="{{route('publishingcompany.destroy', ['id' => $company->id])}}" onsubmit="return confirm('Deseja realmente remover essa editora? OBS : Todos os livros pertecentes à ela também serão removidos.');">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></button>
            </form>
        </td>
        </tr>        
        @endforeach
        </tbody>
    
    </table>    

    </div>
    <script>
        window.onload = function(){
            $("#authors-table").dataTable({
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