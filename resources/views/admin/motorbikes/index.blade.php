@extends('admin.layouts._masterLayout')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
  <div class="block">
    @if(session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
    @endif
    <div class="title"><strong>Motorbikes</strong></div>
    <a href="{{ route('admin.motorbike.create') }}" class="btn btn-primary text-black">Add new</a>
    @if (count($motorbikes))
      <div class="table-responsive"> 
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Model</th>
              <th>Brand</th>
              <th>Preview</th>
              <th>Price Per Day</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($motorbikes as $bike)
              <tr id="row-{{ $bike->id }}">
                <th scope="row">{{ $bike->id }}</th>
                <td class="">{{ $bike->model }}</td>
                <td>{{ $bike->brand }}</td>
                <td><img style="width: 80px; height: 40px; object-fit: cover" src="{{ asset('uploads/motorbike/' . $bike->images[0]->name) }}" alt="" srcset=""></td>
                <td>{{ $bike->price_per_day }}₫</td>
                <td>{{ $bike->status }}</td>
                <td>
                  <a href="{{ route('admin.motorbike.edit', $bike->id) }}" class="btn btn-primary text-black">Edit</a>
                  <a href="{{ route('admin.motorbike.delete', $bike->id) }}" class="btn btn-secondary text-black delete-btn">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $motorbikes->render('admin.layouts._paginate') }}
    @endif
  </div>
</div>

    
@endsection

@section('scripts')
{{-- <script src="{{ asset('custom/admin/js/deleteRow.js') }}"></script>
<script>
$(".delete-btn").click(e => {
    const itemId = e.target.getAttribute('data-id')
    deleteRow(itemId, 'products')
    $('#row-' + itemId).remove()
});
</script> --}}
@endsection