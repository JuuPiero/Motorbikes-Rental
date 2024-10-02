<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
    {{-- <div class="avatar"><img src="{{ asset('uploads/avatar.jpg')}}" alt="..." class="img-fluid rounded-circle"></div> --}}
    <div class="title">
        <h1 class="h5">{{ Auth::guard('admin')->user()->first_name . ' ' . Auth::guard('admin')->user()->last_name }}</h1>
        <p>Admin</p>
    </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin') }}"> <i class="icon-home"></i>Home</a></li>
        <li class=""><a href="{{ route('admin.account') }}"> <i class="icon-user"></i>Account</a></li>

        {{-- <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>
                Motobikes 
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.category') }}">List all</a></li>
                <li><a href="{{ route('admin.category.create') }}">Add new</a></li>
            </ul>
        </li> --}}
        <li>
            <a href="#productDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i> Motorbikes 
            </a>
            <ul id="productDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('admin.motorbike') }}">List all</a></li>
                <li><a href="{{ route('admin.motorbike.create') }}">Add new</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.rentals') }}"><i class="icon-windows"></i>Rentals</a>
        </li>
        <li>
            <a href="{{ route('admin.rating') }}"><i class="icon-windows"></i>Ratings</a>
        </li>
        {{-- <li>
            <a href="{{ route('admin.rentals') }}"><i class="icon-windows"></i>Transactions</a>
        </li> --}}
        {{-- <li><a href="{{ route('admin.rating') }}"><i class="icon-padnote"></i>Ratings </a></li>
        <li><a href="{{ route('admin.setting') }}"><i class="icon-settings"></i>Settings </a></li> --}}

    </ul>
</nav>