@extends('admin.layouts._masterLayout')

@section('content')
<div class="container-fluid">

  <div class="block">
      <div class="title"><strong>Rentals</strong></div>
      {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-primary text-black">Add new</a> --}}
      <div class="table-responsive"> 
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Motorbike</th>
              <th>Amount</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rentals as $rental)
              <tr>
                <th scope="row">{{ $rental->id }}</th>
                <td><a href="{{route('admin.user.detail', $rental->user->id)}}">{{ $rental->user->first_name . " " . $rental->user->last_name }}</a></td>
                <td><a href="">{{ $rental->motorbike->model }}</a></td>
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
      {{ $rentals->render('admin.layouts._paginate') }}

  </div>
</div>

    
@endsection

{{-- @section('scripts')
<script>
  const statusColors = {
    'Pending': '#FFA500',
    'Processing': '#FFD700',
    'Shipped': '#008000',
    'Completed': '#00FF19',
    'Canceled': '#FF0000'
  };
  const orderStatusEl = document.querySelectorAll('.order-status')

  orderStatusEl.forEach(element => {
    Object.keys(statusColors).forEach(color => {
      if (element.textContent === color) {
        element.style.backgroundColor = statusColors[color];
        // element.height = 'fit-content';
      }
    })
  });
</script>
<script>
  const filterFormElement = document.querySelector('.filter-form')
  const statusInputElement = document.querySelector('.order-status-input')
  statusInputElement.addEventListener('change', e => {
    filterFormElement.submit()
  })
</script>
@endsection --}}