@extends('client.layouts._layout')


@section('content')
@if(session('message'))
  <script>
    alert("{{ session('message') }}")
  </script>
@endif
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{asset('assets/client/images/bg_1.jpg')}}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Fast &amp; Easy Way To Rent A Motobike</h1>
          <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
          <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="ion-ios-play"></span>
            </div>
            <div class="heading-title ml-5">
              <span>Easy steps for renting a Motobike</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

 {{-- <section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12	featured-top">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex align-items-center">
            <form action="#" class="request-form ftco-animate bg-primary">
              <h2>Make your trip</h2>
              <div class="form-group">
                <label for="" class="label">Pick-up location</label>
                <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
              </div>
              <div class="form-group">
                <label for="" class="label">Drop-off location</label>
                <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
              </div>
              <div class="d-flex">
                <div class="form-group mr-2">
                  <label for="" class="label">Pick-up date</label>
                  <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
                </div>
                <div class="form-group ml-2">
                  <label for="" class="label">Drop-off date</label>
                  <input type="text" class="form-control" id="book_off_date" placeholder="Date">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="label">Pick-up time</label>
                <input type="text" class="form-control" id="time_pick" placeholder="Time">
              </div>
              <div class="form-group">
                <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
              </div>
            </form>
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <div class="services-wrap rounded-right w-100">
              <h3 class="heading-section mb-4">Better Way to Rent Your Perfect Motobikes</h3>
              <div class="row d-flex mb-4">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                    </div>
                  </div>      
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Select the Best Deal</h3>
                    </div>
                  </div>      
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">Reserve Your Rental Motobike</h3>
                    </div>
                  </div>      
                </div>
              </div>
              <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Motobike</a></p>
            </div>
          </div>
        </div>
    </div>
  </div>
</section> --}}


<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">What we offer</span>
        <h2 class="mb-2">Feeatured Vehicles</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="carousel-car owl-carousel">

          @foreach ($motorbikes as $bike)
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('uploads/motorbike/' . $bike->images[0]->name) }});">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#">{{ $bike->model }}</a></h2>
                  <div class="d-flex mb-3">
                    <span class="cat">{{ $bike->brand }}</span>
                    <p class="price ml-auto"> {{ $bike->price_per_day }} đ<span>/day</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block">
                    <a href="{{route('rental.create', $bike->id)}}" class="btn btn-primary py-2 mr-1">Book now</a> 
                    <a href="{{ route('motorbike.detail', $bike->id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                </div>
              </div>
            </div>
          @endforeach
       
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('assets/client/images/about.jpg')}});">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">About us</span>
          <h2 class="mb-4">Welcome to Carbook</h2>

          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-3">Our Latest Services</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Wedding Ceremony</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">City Transfer</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Airport Transfer</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
          <div class="text w-100">
            <h3 class="heading mb-2">Whole City Tour</h3>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="60">0</strong>
            <span>Year <br>Experienced</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="1090">0</strong>
            <span>Total <br>Motorbikes</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="2590">0</strong>
            <span>Happy <br>Customers</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="67">0</strong>
            <span>Total <br>Branches</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>	    

@endsection
