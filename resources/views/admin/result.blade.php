@extends('admin.layouts._masterLayout')

@section('content')
<div class="container-fluid">
    <div class="block">
        <h2>Keyword: <span style="color: chartreuse">{{$_GET['keywords']}}</span></h2>
    </div>

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
    
@endsection
@section('scripts')
<script>
 
</script>
@endsection