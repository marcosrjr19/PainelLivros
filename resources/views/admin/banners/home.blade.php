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
        <a href="{{route('banners.create')}}"><button type="button" class="btn-block btn btn-success">Adicionar Novo</button></a>
        </div>
      
          
    </div>
   

    <table id="banners-table" class="table table-striped table-responsive-md btn-table">
        <thead>
        <tr>
            <th>Imagem</th>
            <th>Remover</th>
         
        </tr>
        </thead>
        <tbody>
          
        @foreach ($banners as $banner)
        <tr>
        <td> <img src="{{asset($banner->image_src_resized)}}" class="img-fluid"/></td>
        <td>
            <form method="POST" action="{{route('banners.destroy', ['id' => $banner->id])}}" onsubmit="return confirm('Deseja realmente remover este banner?');">
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
        $(document).ready(function(){
            $("#banners-table").dataTable({
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