@extends('client.layouts._layout')


@section('content')
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

<section class="ftco-section ftco-no-pt bg-light">

    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">
            <div class="row no-gutters">
                <div class="col-md-5 d-flex align-items-center">
                <form enctype="multipart/form-data" action="{{ route('rental.store') }}" method="POST" class="request-form ftco-animate bg-primary">
                    @csrf
                    <input type="hidden" name="motorbike_id" value="{{$motorbike->id}}" />
                    <h2>Make your trip</h2>
                    <div class="form-group">
                        <label for="" class="label">Phone Number</label>
                        <input required value="{{ Auth::user()->phone_number }}" type="text" name="phone_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label">Pick-up location</label>
                        <input required  name="pick_up_location" type="text" class="form-control" placeholder="City, Airport, Station, etc">
                    </div>
                    <div class="form-group">
                        <label for="" class="label">Drop-off location</label>
                        <input required  name="drop_off_location" type="text" class="form-control" placeholder="City, Airport, Station, etc">
                    </div>
                    <div class="d-flex">
                        <div class="form-group mr-2">
                            <label for="" class="label">Pick-up date</label>
                            <input type="datetime-local" name="start_time" class="form-control">
                            {{-- <input type="text" class="form-control" id="book_pick_date" placeholder="Date"> --}}
                        </div>
                        <div class="form-group ml-2">
                            <label for="" class="label">Drop-off date</label>
                            <input type="datetime-local" class="form-control" name="end_time" placeholder="Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="label">Upload your driver license</label>
                        <input accept="image/*" required type="file" name="driver_license" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                        <label for="" class="label">Pick-up time</label>
                        <input type="text" class="form-control" id="time_pick" placeholder="Time">
                    </div> --}}
                    <div class="form-group">
                        <label for="" class="label">Total Price</label>
                        <input style="background-color: white !important; color: black !important; font-weight: bolder;" type="number" readonly value="" class="form-control total-price" name="total_amount" />
                        <span style="color: black; font-weight: bold;">VNĐ</span>
                    </div>
                    <div class="form-group">
                        <select name="" class="form-control">
                            <option style="color: red;" value="" class="">Cash Payment</option>
                            <option style="color: red;" value="" class="">Momo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                    </div>
                </form>
                </div>
                <div class="col-md-7 d-flex align-items-center">
                    
                    {{-- <h3></h3> --}}
                    <div class="services-wrap rounded-right w-100">
                        <div class="mb-2"><span class="bike-image"><img style="width: 180px; height: 100px; object-fit: cover" src="{{ asset('uploads/motorbike/' . $motorbike->images[0]->name) }}" alt="" srcset=""></span> <span class="h2">{{$motorbike->model}}</span>
                        <span style="display: block;">Price per Day: <strong class="total-price">{{$motorbike->price_per_day}}</strong>đ</span></div>
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
                        <p><a href="#" class="btn btn-primary py-3 px-4">Go back to Home Page</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</section>

@endsection

@section('scripts')
<script>
    const pricePerDay = {{ $motorbike->price_per_day }}

</script> 
<script src="{{asset('custom/client/js/createRental.js')}}"></script>   
@endsection