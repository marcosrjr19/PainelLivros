@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
       <div class="row">
        <div class="col-xs-12 text-center"><h1>Painel Administrativo - (CRUD) Livros, Autores e Editoras</h1></div>
    </div>
@stop

@section('content')

<div class="container-fluid">


    <div class="chart-contaier" style="position: relative; height:40vh; width:80vw">
            <canvas id="pie-chart"></canvas>
    </div>
      
</div>
    
<script>

$(document).ready(function(){


    new Chart(document.getElementById("pie-chart"), {
    responsive : true,
    type: 'pie',
    data: {
      labels: {!! json_encode($books_companies['name']) !!},
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: {!! json_encode($books_companies['count_books']) !!}
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Livros disponíveis por Editora'
      }
    }
});

});


</script>
@stop