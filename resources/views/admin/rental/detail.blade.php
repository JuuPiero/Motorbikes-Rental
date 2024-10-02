@extends('admin.layouts._masterLayout')

@section('content')
<div class="container-fluid">
    {{-- <a href="{{ route('admin.invoice.create', $order->id) }}" class="btn btn-primary text-black mb-2">
        Print Invoice
    </a>
    <a href="{{ route('admin.invoice.show', $order->id) }}" class="btn btn-primary text-black mb-2">
        Show Invoice</a> --}}

    <div class="block">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="title"><strong>Order-{{ $rental->id }}</strong></div>
        <p><strong>User : </strong> <a href="
            {{-- {{route('admin.user.detail', $order->user->id)}} --}}
            ">{{  $rental->user->email . ' - ' . $rental->user->first_name . ' ' . $rental->user->last_name}}</a></p>
        <div class="row">
            <div class="col-4 ">
                <strong class="d-block">Driver License : </strong> 
                <img src="{{ asset('uploads/rental/' . $rental->driver_license) }}" alt="" style="width: 400px; object-fit: cover; height: 250px;">
            </div>
            @if ($rental->pre_rental_image)
                <div class="col-4 ">
                    <strong class="d-block">Pre rental Bike photo : </strong> 
                    <img src="{{ asset("uploads/rental/" . $rental->pre_rental_image) }}" alt="" style="width: 400px; object-fit: cover; height: 250px;">
                </div>
            @endif
        </div>
        <p><strong>Phone Number : </strong> {{ $rental->phone_number }}</p>
        <strong class="d-block">Pick up location : <span style="color: blue;" class="h4">{{ $rental->pick_up_location }}</span></strong>
        <strong class="d-block">Drop off location : <span style="color: blue;" class="h4">{{ $rental->drop_off_location }}</span></strong>
       
        {{-- <strong>Note:</strong>
        <p>{{ $order->note }}</p> --}}

        <strong class="d-block">Model :</strong>
        <p>{{ $rental->motorbike->model }}</p>
        
        <h4>Total Amount: </h4>
        <p><strong class="h3">{{ $rental->total_amount }}</strong>₫</p>
        {{-- <div class="title"><strong>Order Items</strong></div> --}}
        {{-- <div class="table-responsive"> 
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td>{{ $item->product_sku }}</td>
                            @if ($item->product != null)
                                <td>{{ $item->product_name }} 
                                    @foreach ($item->product->attributes as $attribute)
                                        {{$attribute->name . ' : ' .  $attribute->value}}
                                    @endforeach
                                </td>
                            @else
                                <td>{{ $item->product_name }}</td>
                            @endif
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->product_price }}₫</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
     
    </div>
    <div class="block">
        <form style="margin-top: 20px" class="form-horizontal" method="POST" action="{{ route('admin.rental.update', $rental->id) }}" enctype="multipart/form-data">
            @csrf
            
            @if($rental->status == 'Completed' || $rental->status == 'Canceled')
                <div class="form-group row">
                    <h3 class="col-sm-3 form-control-label">Status</h3>
                    <div class="col-sm-3">
                        <input value="{{$rental->status}}" disabled readonly type="text" class="form-control is-valid">
                    </div>
                </div>
            @else
                @if($rental->pre_rental_image == null)
                    <div class="line"></div>
                    <div class="form-group">
                        <h4 class="form-control-label">Upload Current Bike photo</h4>
                        <div class="col-sm-3">
                            <input name="pre_rental_image" type="file" class="form-control" />
                        </div>
                    </div>
                @endif
                <div class="form-group row">
                    <h3 class="col-sm-3 form-control-label">Status</h3>
                    <div class="col-sm-3">
                        <select name="status" class="form-control is-invalid">
                            {{-- <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                            <option value="Renting">Renting</option>
                            <option value="Completed">Completed</option> --}}
                            @foreach ($rentalStatus as $status)
                                <option {{$status == $rental->status ? 'selected' : ''}} value="{{$status}}">{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>  


@endsection