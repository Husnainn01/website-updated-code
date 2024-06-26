@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_CATEGORY }}</h1>

    <form action="{{ route('admin_category_update',$category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin_category_view') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ VIEW_ALL }}</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ NAME }} *</label>
                    <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">{{ SLUG }}</label>
                    <input type="text" name="category_slug" class="form-control" value="{{ $category->category_slug }}">
                </div>
                <div class="form-group">
                    <label for="">{{ EXISTING_PHOTO }}</label>
                    <div>
                        <img src="{{ asset('uploads/categories_images/'.$category->category_image) }}" alt="" class="w_200">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_image">{{ CHANGE_PHOTO }}</label>
                    <div>
                        <input type="file" name="category_image" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ SEO_INFORMATION}}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ TITLE }}</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $category->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">{{ META_DESCRIPTION }}</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $category->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
            </div>
        </div>
    </form>

@endsection
