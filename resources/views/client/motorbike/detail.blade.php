@extends('client.layouts._layout')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('assets/client/images/bg_1.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Motorbike Details</h1>
        </div>
      </div>
    </div>
</section>
      

<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <div class="owl-carousel owl-theme">
                        @foreach ($motorbike->images as $image)
                            <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('uploads/motorbike/' . $image->name) }});">
                            </div>
                        @endforeach
                    </div>
                    <div class="text text-center">
                        <span class="subheading">{{ $motorbike->brand }}</span>
                        <h2>{{ $motorbike->model }}</h2>
                        <h3> {{ $motorbike->price_per_day }}đ/day</h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                        <div class="text">
                        <h3 class="heading mb-0 pl-3">
                            Mileage
                            <span>40,000</span>
                        </h3>
                    </div>
                </div>
            </div>
          </div>      
        </div> --}}
        {{-- <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                    <div class="text">
                        <h3 class="heading mb-0 pl-3">
                            Transmission
                            <span>Manual</span>
                        </h3>
                  </div>
              </div>
            </div>
          </div>      
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                    <div class="text">
                      <h3 class="heading mb-0 pl-3">
                          Seats
                          <span>5 Adults</span>
                      </h3>
                  </div>
              </div>
            </div>
          </div>      
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                    <div class="text">
                      <h3 class="heading mb-0 pl-3">
                          Luggage
                          <span>4 Bags</span>
                      </h3>
                  </div>
              </div>
            </div>
          </div>      
        </div>
        <div class="col-md d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services">
            <div class="media-body py-md-4">
                <div class="d-flex mb-3 align-items-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                    <div class="text">
                      <h3 class="heading mb-0 pl-3">
                          Fuel
                          <span>Petrol</span>
                      </h3>
                  </div>
              </div>
            </div>
          </div>      
        </div>
        </div> --}}
      
        <div class="row">
            <div class="col-md-9 pills">
                <div class="bd-example bd-example-tabs">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                            {!! $motorbike->description !!}
                        </div>

                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            @auth
                                <div class="row">
                                    <h5 class="bold">Wirte your review</h5>
                                    <form class="col-9" method="POST" action="{{route('user.create.rating')}}">
                                        @csrf
                                        <input value="{{ $motorbike->id }}" type="hidden" name="motorbike_id" />
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control mb-2" name="rating" id="">
                                                <option value="1">1 ★</option>
                                                <option value="2">2 ★</option>
                                                <option value="3">3 ★</option>
                                                <option value="4">4 ★</option>
                                                <option value="5">5 ★</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comment" id="" cols="30" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            @endauth
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="head">{{ $motorbike->ratings->count() }} Reviews</h3>
                                    @foreach ($motorbike->ratings as $rating)
                                        <div class="review d-flex">
                                            {{-- <div class="user-img" style="background-image: url(images/person_1.jpg)"></div> --}}
                                            <div class="desc m-0" style="flex: 1;">
                                                <h4>
                                                    <span class="text-left">
                                                        {{$rating->user->first_name . ' ' . $rating->user->last_name}}
                                                    </span>
                                                    <span class="text-right">{{ $rating->created_at }}</span>
                                                </h4>
                                                <p class="star">
                                                    <span>
                                                        @for ($i = 0; $i < $rating->rating; $i++)
                                                            <i class="ion-ios-star"></i>
                                                        @endfor
                                                    </span>
                                                    @auth
                                                        @if ($rating->user_id === Auth::user()->id)
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-trash"></i></a></span>
                                                        @endif
                                                    @endauth
                                                </p>
                                                <p>{{ $rating->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <a class="btn btn-primary p-3 " href="{{route('rental.create', $motorbike->id)}}">Book now</a>
               
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Choose Motorbike</span>
                <h2 class="mb-2">Related Motorbikes</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($suggests as $bike)
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('uploads/motorbike/' . $bike->images[0]->name ) }});">
                        </div>
                        <div class="text">
                            <h2 class="mb-0"><a href="{{ route('motorbike.detail', $bike->id) }}">{{ $bike->model }}</a></h2>
                            <div class="d-flex mb-3">
                                <span class="cat">{{ $bike->brand }}</span>
                                <p class="price ml-auto">{{ $bike->price_per_day }}đ <span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block"><a href="{{route('rental.create', $bike->id)}}" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{ route('motorbike.detail', $bike->id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
  
@endsection

@section('scripts')
<script>
   $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        autoplay: true,
        dots: false,
    })
</script>
@endsection