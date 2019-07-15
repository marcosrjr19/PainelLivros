
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
                <a href="{{url('/admin/users-roles')}}"> <button type="button" class="btn-block btn btn-info">Voltar</button></a>
        </div>
               
            <form method="POST" action="{{route('users-roles.update', ['id' => $user->id])}}">
                <input name="_method" type="hidden" value="PUT">

                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="user-name">Usuário :</label>
                    <input type="text" id="user-name" class="form-control" readonly value="{{$user->name}}">
                </div>
                <div class="form-group">
                        <label for="user-roles">Permissões</label>
                        <p><small>As permissões de Manager permitem ao Usuário acessar o Painel Administrativo, enquanto Viewer Apenas Visualiza o conteúdo do site, o usuário deverá ter ao menos uma permissão configurada</small></p>
                        <select class="form-control" id="user-roles" name="roles[]" multiple="multiple">
                            @foreach ($user->roles as $role)
                            <option selected value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>

    <script>
            $(document).ready(function(){
                $('#user-roles').select2({
                placeholder : "Selecione ao menos uma permissão",
                width : '100%'
            });
        
            });
        </script>
@endsection