@extends('layouts.app_home')

@section('content')
<div class="container-fluid banner">
  <div class="row">
    
    <div class="left col-lg-7 col-md-12 float-left p-5">
      <div class="trapezoid"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum elementum at ex vitae ornare. Phasellus tortor elit, facilisis ac est vitae, placerat varius diam.</p>
    </div>
    
    <div class="right col-lg-5 col-md-12" >
      
      <img class="d-block w-100" alt="Image" src="{{asset('storage/pictures/'. 'banner.jpeg')}}">
    </div>
  </div>
</div>

</div>

<div class="container py-5 car">
  
  <h1 class="title" >{{__('lang.labels.home.our_offer')}}</h1>
  <hr class="white-line">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($cars->count() >= 5 ? $cars->random(5) : $cars as $key => $car)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach ($cars->count() >= 5 ? $cars->random(5) : $cars as $key => $car)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <img class="d-block w-100" src="{{ asset('storage/'.$car->image_path) }}" alt="Slide {{ $key }}">
        <div class="carousel-caption d-none d-md-block desc">
        <h4>{{$car->name . " " . $car->model . " " . $car->yearOfProduction}}</h4>
        <p>{{__('lang.cars.all.price')}}: {{$car->price}} PLN</p>
      </div>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">{{__('lang.labels.home.previous')}}</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">{{__('lang.labels.home.next')}}</span>
  </a>
</div>
</div>

<div id="uslugi" class="container">

  <hr class="white-line">
  <h1 class="title" id="About">{{__('lang.labels.home.about')}}</h1>
  <hr class="white-line">
  <div class="row justify-content-center u-item">
    <div class="col-md-12 col-lg-6 order-lg-1 order-md-1 row-item" data-aos="fade-left">
      <div class="image"><img class="d-block w-100" src="{{asset('storage/pictures/'.'banner.jpeg')}}" alt="obrazek"></div>
    </div>
    <div class="col-md-12 col-lg-6 order-lg-2 order-md-2 opis" data-aos="fade-right">
      <div class="opis">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum, magna non consectetur
          feugiat, odio orci maximus sem, non vehicula dui risus nec urna. Mauris posuere ultricies nulla sit amet
          volutpat. </p>
      </div>
    </div>
  </div>
  <hr class="white-line">
  <div class="row justify-content-center u-item">
    <div class="col-md-12 col-lg-6 order-lg-2 order-md-1 row-item" data-aos="fade-right">
      <div class="image"><img class="d-block w-100"src="{{asset('storage/pictures/'.'banner.jpeg')}}" alt="obrazek"></div>
    </div>
    <div class="col-md-12 col-lg-6 order-lg-1 order-md-2 opis" data-aos="fade-left">
      <div class="opis">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum, magna non consectetur
          feugiat, odio orci maximus sem, non vehicula dui risus nec urna. Mauris posuere ultricies nulla sit amet
          volutpat. Ut dapibus volutpat pretium. Integer pharetra nulla nisl, sed pulvinar sapien mattis nec. Cras
          semper, sapien a rutrum cursus, ex libero vestibulum mauris, in varius lorem orci id libero. Duis urna
          nisi, rutrum eu magna aliquam, vestibulum mattis velit. Orci varius natoque penatibus et magnis dis
          parturient montes, nascetur ridiculus mus. Curabitur id ante vel purus pretium elementum sit amet ut sem.
          Morbi nisi erat, bibendum nec tortor sed, aliquet eleifend justo.</p>
      </div>
    </div>
  </div>
  <hr class="white-line">
  <div class="row justify-content-center u-item">
    <div class="col-md-12 col-lg-6 order-lg-1 order-md-1 row-item" data-aos="fade-left">
      <div class="image"><img class="d-block w-100"src="{{asset('storage/pictures/'.'banner.jpeg')}}" alt="obrazek"></div>
    </div>
    <div class="col-md-12 col-lg-6 order-lg-2 order-md-2 opis" data-aos="fade-right">
      <div class="opis">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent fermentum, magna non consectetur
          feugiat, odio orci maximus sem, non vehicula dui risus nec urna. Mauris posuere ultricies nulla sit amet
          volutpat. Ut dapibus volutpat pretium. Integer pharetra nulla nisl, sed pulvinar sapien mattis nec. Cras
          semper, sapien a rutrum cursus, ex libero vestibulum mauris, in varius lorem orci id libero. Duis urna
          nisi, rutrum eu magna aliquam, vestibulum mattis velit. Orci varius natoque penatibus et magnis dis
          parturient montes, nascetur ridiculus mus. Curabitur id ante vel purus pretium elementum sit amet ut sem.
          Morbi nisi erat, bibendum nec tortor sed, aliquet eleifend justo.</p>
      </div>
    </div>
  </div>
  <hr class="white-line">
  </div>
  
</div>


@endsection

@section("javascript")
$('.carousel').carousel()
@endsection