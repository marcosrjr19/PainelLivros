@extends('layouts.app')

@section('content')
    
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Books Panel</h1>


      </div>


      <div class="col-lg-9">

        <div id="carousel-banners" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">

          @if(!$banners->isEmpty())
            @foreach ($banners as $key => $banner)
              <li data-target="#carousel-banners" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
            @endforeach
          @else
          <li data-target="#carousel-banners" data-slide-to="0" class="active"></li>
          @endif
          </ol>
          <div class="carousel-inner" role="listbox">
          @if(!$banners->isEmpty())
            @foreach ($banners as $key => $banner)
              <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <img class="d-block ml-auto mr-auto img-fluid" src="{{asset($banner->image_src)}}" alt="First slide">
              </div>  
            @endforeach
          @else
          <div class="carousel-item active">
              <img class="d-block ml-auto mr-auto img-fluid" src="{{asset('uploads/images/banners/default.png')}}" alt="First slide">
            </div>  
          @endif
          </div>
          <a class="carousel-control-prev" href="#carousel-banners" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carousel-banners" role="button" data-slide="next">
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
              <h1>Nenhum Livro Cadastrado</h1>
            </div>
          @endif
         

        </div>
       

      </div>
      

    </div>
  

  </div>
 
@endsection
