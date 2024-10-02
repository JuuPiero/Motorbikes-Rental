@extends('client.layouts._layout')


@section('content')
{{-- <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('assets/client/images/bg_3.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="ftco-section contact-section">
    <h1 style="text-align: center">Your profile</h1>
    @if ($errors->any())
    <div class="alert alert-danger container">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-6 col-sm-12 col-md-6 col-lg-6 offset-md-3">
            <form method="post" action="{{route('user.profile.update')}}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                          <label for="CustomerEmail">Email</label>
                          <input type="email" name="email" readonly class="form-control"  value="{{$user->email}}">
                      </div>
                  </div>
                  <div class="d-flex col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group mr-2">
                        <label for="" class="label">First Name</label>
                        <input  value="{{$user->first_name}}" name="first_name" id="inlineFormInput" type="text" placeholder="First Name" class="form-control">
                    </div>
                    <div class="form-group ml-2">
                        <label for="" class="label">Last Name</label>
                        <input value="{{$user->last_name}}" name="last_name" id="inlineFormInputGroup" type="text" placeholder="Last Name" class="mr-sm-5 form-control">
                    </div>
                  </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="CustomerEmail">Phone Number</label>
                        <input type="text" name="phone_number" placeholder="" id="CustomerEmail" class="form-control" value="{{$user->phone_number}}">
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="CustomerPassword">Password</label>
                        <input type="password" value="" name="password" placeholder="" id="CustomerPassword" class="form-control">                        	
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="CustomerPassword"New >New Password</label>
                        <input type="password" value="" name="new_password" placeholder="" id="CustomerPassword" class="form-control">                        	
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="submit" class="btn btn-primary mb-3" value="Update Profile">
                    </div>
                </div>
            </form>
        </div>
      </div>

      <div class="rentals">
        <h2 class="">All Rentals</h2>
        @foreach ($rentals as $rental)
          <div class="rental-item card m-2">
            <div class="border d-flex justify-content-between">
              <span>{{ timeAgo($rental->created_at) }}</span>  <strong>Status: {{ $rental->status }}</strong>
              @if ($rental->status == 'Unpaid')
                <a href="{{ route('user.cancel.rental', $rental->id) }}" class="btn btn-primary">Hủy đơn</a>
              @endif
            </div>
            <div class="motor-info d-flex justify-content-between align-items-center">
              <h5 class="ml-2">{{ $rental->motorbike->model }}</h5>
              <p>{{ $rental->start_time }} - {{ $rental->end_time }} </p>
              <img class="" src="{{ asset('uploads/motorbike/' . $rental->motorbike->images[0]->name) }}" alt="" srcset="" style="width: 180px; height: 90px;">
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  

@endsection