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
    <h1 style="text-align: center">Login</h1>
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
      <div class="row d-flex mb-5 contact-info justify-content-center">
        <div class="col-md-8 block-9 mb-md-5">
          <form action="{{route('user.check.login')}}" method="POST" class="bg-light p-5 contact-form">
            {{-- <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name">
            </div> --}}
            @csrf
            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Your Password">
            </div>
            <div class="form-group" >
                <label for="">Remember me</label>
                <input type="checkbox" name="remember" class="" >
            </div>
            {{-- <div class="form-group">
              <textarea name="address" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div> --}}
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
            </div>
            <a href="{{ route('user.register') }}">Create account</a>
          </form>
        </div>
      </div>
    </div>
  </section>
  

@endsection