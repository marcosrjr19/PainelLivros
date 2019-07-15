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
        <a href="{{route('authors.create')}}"><button type="button" class="btn-block btn btn-success">Adicionar Novo</button></a>
        </div>
      
          
    </div>
   

    <table id="users-table" class="table table-striped table-responsive-md btn-table">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Permissões</th>
            <th>Modificar</th>         
        </tr>
        </thead>
        <tbody>
          
        @foreach ($users as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            @foreach ($user->roles as $role)
                {{$role->name}} 
            @endforeach
        </td>
        <td><a href="{{route('users-roles.edit', ['id' => $user->id])}}"><button class="btn btn-warning"><i class="fa fa-fw fa-edit"></i></button></a></td>
        </tr>        
        @endforeach
        </tbody>
    
    </table>    

    </div>
    <script>
        $(document).ready(function(){
            $("#users-table").dataTable({
                "lengthMenu" : false,
                "lengthChange" : false,
                "language": {
            "zeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
            });
        });

    </script>
@endsection