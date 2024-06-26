@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Port</h1>
    <form action="{{ route('admin_listing_port_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_listing_port_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ NAME }} *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('listing_location_name') }}"
                        autofocus required>
                </div>
                <div class="form-group">
                    <label for="">{{ PRICE }} *</label>
                    <input type="text" name="price" class="form-control" autofocus required>
                </div>
                <div class="form-group">
                    <label for="country">Choose Country *</label>
                    <select class="form-control" name="country_id" id="country">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->listing_location_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-body">
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>
@endsection
