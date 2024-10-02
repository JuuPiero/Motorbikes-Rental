@extends('admin.layouts._masterLayout')

@section('content')

<div class="col-lg-12">
    <div class="block">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="title"><strong>Create new Motorbike</strong></div>
        <div class="block-body">
            <form class="form-horizontal" id="mainForm" method="POST" action="{{ route('admin.motorbike.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Model</label>
                    <div class="col-sm-9">
                        <input name="model" type="text" class="form-control" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Brand</label>
                    <div class="col-sm-9">
                        <input name="brand" type="text" class="form-control" required />
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">License Plate</label>
                    <div class="col-sm-9">
                        <input name="license_plate" type="text" class="form-control" required />
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Image(s)</label>
                    <div class="col-sm-4">
                        <input name="images[]" type="file" class="form-control" multiple required/>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Price per day</label>
                    <div class="col-sm-9">
                        <input required name="price_per_day" type="number" placeholder="0 VNĐ" class="form-control">
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="6" name="description" type="text" class="form-control" id="description">
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select name="status" id="" class="form-control">
                            @foreach ($bikeStatus as $status)
                                <option value="{{$status}}">{{ $status }}</option>
                            @endforeach
                            {{-- <option value="Available">Available</option>
                            <option value="Renting">Renting</option>
                            <option value="Disable">Disable</option> --}}
                        </select>
                    </div>
                </div>
                
                <div class="line"></div>
                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary submit-btn">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>

@endsection

@section('scripts')
{{-- <script src="{{ asset('custom/admin/js/addNewProductAttribute.js') }}"></script> --}}
<script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description'); 
</script>

@endsection