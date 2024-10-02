<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Motobikes<span>Book</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <form action="{{ route('home.search') }}" method="GET">
          <div class="form-group m-0">
            <input type="search" name="keywords" placeholder="Search your bike" class="form-control"/>
          </div>
        </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ route('home.about') }}" class="nav-link">About</a></li>
            {{-- <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li> --}}
            {{-- <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li> --}}
            <li class="nav-item"><a href="{{route('home.motorbikes')}}" class="nav-link">Motorbikes</a></li>
            @auth
              <li class="nav-item" ><a style="color: springgreen;" href="{{ route('user.profile') }}" class="nav-link"> {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a></li>
              <li class="nav-item" ><a style="color: darkmagenta;" href="{{route('user.logout')}}" class="nav-link">Logout</a></li>
            @endauth

            @guest
              <li class="nav-item" ><a style="color: darkmagenta;" href="{{route('user.login')}}" class="nav-link">Login</a></li>
            @endguest
          
          </ul>
        </div>
    </div>
  </nav>
<!-- END nav -->