@extends('admin.app_admin')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">{{ EDIT_CONTACT_PAGE_INFO }}</h1>

    <form action="{{ route('admin_page_contact_update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="current_banner" value="{{ $page_contact->banner }}">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ NAME }}</label>
                    <input type="text" name="name" class="form-control" value="{{ $page_contact->name }}">
                </div>
                <div class="form-group">
                    <label for="">{{ DETAIL }}</label>
                    <textarea name="detail" class="form-control editor" cols="30" rows="10">{{ $page_contact->detail }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ EXISTING_BANNER }}</label>
                    <div>
                        <img src="{{ asset('uploads/page_banners/'.$page_contact->banner) }}" alt="" class="w_300">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ CHANGE_BANNER }}</label>
                    <div><input type="file" name="banner"></div>
                </div>
                <div class="form-group">
                    <label for="">{{ STATUS }}</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr1" value="Show" @if($page_contact->status == 'Show') checked @endif>
                            <label class="form-check-label font-weight-normal" for="rr1">{{ SHOW }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="rr2" value="Hide" @if($page_contact->status == 'Hide') checked @endif>
                            <label class="form-check-label font-weight-normal" for="rr2">{{ HIDE }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">{{ ADDRESS }}</label>
                    <textarea name="contact_address" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ EMAIL }}</label>
                    <textarea name="contact_email" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_email }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ PHONE }}</label>
                    <textarea name="contact_phone" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_phone }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">{{ MAP_IFRAME_CODE }}</label>
                    <textarea name="contact_map" class="form-control h_100" cols="30" rows="10">{{ $page_contact->contact_map }}</textarea>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ SEO_INFORMATION }}</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">{{ TITLE }}</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $page_contact->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">{{ META_DESCRIPTION }}</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_contact->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ UPDATE }}</button>
            </div>
        </div>
    </form>
@endsection
