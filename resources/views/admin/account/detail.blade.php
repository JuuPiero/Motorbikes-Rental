@extends('admin.layouts._masterLayout')

@section('content')
<style>
.image-block img {
  width: 300px;
  height: 300px;
}
.info-container {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
.info-line strong {
  color: blueviolet;
}
</style>
<div class="container-fluid">
    {{-- <form class="form-horizontal filter-form" action="{{ route('admin.user.update', $account->id) }}" method="POST">
      <div class="form-group row">
        <div class="col-sm-9 ">
            <button data-id="{{$account->id}}" type="submit" class="btn btn-primary delete-btn">Delete</button>
        </div>
      </div>
    </form> --}}
    @if(session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
          <div class="block m-0 h-100 mb-100">
            <div class="title"><strong>Role : </strong><span>User</span></div>
            <div class="block-body d-flex flex-row justify-content-between">
              <div class="image-block">
                <img src="{{asset('custom/admin/images/user.png')}}" alt="" />
              </div>
              <div class="info-container ml-5" style="flex: 1;">
                
                <div class="info-line">
                  <span><strong>First Name : </strong> {{ $account->first_name }}</span>
                </div>
                <div class="info-line">
                  <span><strong>Last Name : </strong> {{ $account->last_name }}</span>
                </div>
                <div class="info-line">
                  <span><strong>Phone Number : </strong> {{ $account->phone_number }}</span>
                </div>
                <div class="info-line">
                  <span><strong>Address : </strong> {{ $account->address }}</span>
                </div>

                <div class="info-line">
                  <span><strong>Rentals : </strong> {{ count($account->rentals) }} time(s)</span>
                </div>
                <div class="info-line">
                  <span><strong>Registry : </strong> {{ $account->created_at }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Horizontal Form-->
        <div class="col-lg-6">
          <div class="block">
            <div class="title"><strong class="d-block">Update Form</strong></div>
            <div class="block-body">
              <form class="form-horizontal" action="{{ route('admin.user.update', $account->id) }}" method="POST">
                <div class="form-group row">
                  @csrf
                  <label class="col-sm-3 form-control-label">Email</label>
                  <div class="col-sm-9">
                    <input disabled id="inputHorizontalSuccess" type="email" placeholder="Email Address" class="form-control form-control-success" value="{{$account->email}}"><small class="form-text">Email that remains unchanged.</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">First Name</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" type="text" placeholder="First Name" class="form-control form-control-warning" name="first_name" value="{{$account->first_name}}" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" type="text" placeholder="Last Name" class="form-control form-control-warning" name="last_name" value="{{$account->last_name}}"/>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">New Password</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" type="password" placeholder="Pasword" class="form-control form-control-warning" name="new_password" />
                  </div>
                </div>
                <div class="form-group row">       
                  <div class="col-sm-9 offset-sm-3">
                    <input type="submit" value="Update" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
       
    </div>

    <div class="block">
      <div class="title"><strong>Rentals</strong></div>
      {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-primary text-black">Add new</a> --}}
      <div class="table-responsive"> 
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Motorbike</th>
              <th>Amount</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($account->rentals as $rental)
              <tr>
                <th scope="row">{{ $rental->id }}</th>
                <td><a href="{{ route('admin.motorbike.edit',  $rental->motorbike->id) }}">{{ $rental->motorbike->model }}</a></td>
                <td>{{ $rental->total_amount }}₫</td>
                <td>{{ $rental->start_time }}</td>
                <td>{{ $rental->end_time }}</td>

                {{-- <td>{{ timeAgo($order->created_at) }}</td> --}}
                <td ><span style="border-radius: 4px" class="">{{ $rental->status }}</span></td>
                <td>
                  <a href="{{ route('admin.rental.detail', $rental->id) }}" class="btn btn-primary text-black">Detail</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- {{ $account->rentals->render('admin.layouts._paginate') }} --}}

  </div>
</div>
@endsection

@section('scripts')

@endsection