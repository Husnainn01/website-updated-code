@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ ADD_LISTING_LOCATION }}</h1>

    <form action="{{ route('admin_listing_location_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_listing_location_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ NAME }} *</label>
                    <input type="text" name="listing_location_name" class="form-control" value="{{ old('listing_location_name') }}" autofocus required>
                </div>
                <div class="form-group">
                    <label for="email">{{ EMAIL }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="">{{ SLUG }}</label>
                    <input type="text" name="listing_location_slug" class="form-control" value="{{ old('listing_location_slug') }}">
                </div>
                <div class="form-group">
                    <label for="">{{ PHOTO }} *</label>
                    <div>
                        <input type="file" name="listing_location_photo" required>
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ SEO_INFORMATION }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ TITLE }}</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>
                <div class="form-group">
                    <label for="">{{ META_DESCRIPTION }}</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ SUBMIT }}</button>
            </div>
        </div>
    </form>

@endsection
