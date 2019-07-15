@extends('layouts.app')

@section('content')
    
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Books Panel</h1>


      </div>


      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
          </a>
        </div>

        <div class="row">

          @if(!$books->isEmpty())

          @foreach ($books as $book)

          <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img src="{{asset($book->image_src)}}" class="img-fluid"/></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{$book->name}}</a>
                  </h4>
                  <h5>Editora : {{$book->publishingCompany->name}}</h5>
                  <p class="card-text">Autor(es) :
                      @foreach ($book->authors as $author)
                     {{$author->author_name}}
                      @endforeach
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
              
          @endforeach


          @else
            <div class="col-lg-4 col-md-6 mb-4">
              Nenhum Livro Cadastrado
            </div>
          @endif
         

        </div>
       

      </div>
      

    </div>
  

  </div>
 
@endsection