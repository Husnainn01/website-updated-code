@extends('admin.app_admin')
@section('admin_content')
<div class="container">
    <h2>Edit Role</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('roles.update', $role) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" required name="name" placeholder="Enter role name" value="{{ $role->name }}">
        </div>
        <div class="row">
            <div class="col-6 mt-2">
                <h5>Settings</h5>
                @foreach($setting_permissions as $setting_permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $setting_permission->id }}" id="permission_{{ $setting_permission->id }}" {{ in_array($setting_permission->id, $rolePermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="permission_{{ $setting_permission->id }}">
                        {{ $setting_permission->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Insurance</h5>
                @foreach($insurance_permissions as $insurance_permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $insurance_permission->id }}" id="permission_{{ $insurance_permission->id }}" {{ in_array($insurance_permission->id, $rolePermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="permission_{{ $insurance_permission->id }}">
                        {{ $insurance_permission->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Freight</h5>
                @foreach($freight_permissions as $freight_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $freight_permission->id }}" id="permission_{{ $freight_permission->id }}" {{ in_array($freight_permission->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $freight_permission->id }}">
                            {{ $freight_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Inspections</h5>
                @foreach($inspection_permissions as $inspection_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $inspection_permission->id }}" id="permission_{{ $inspection_permission->id }}" {{ in_array($inspection_permission->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $inspection_permission->id }}">
                            {{ $inspection_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Offer Management</h5>
                @foreach($offer_management_permissions as $offer_management_permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $offer_management_permission->id }}" id="permission_{{ $offer_management_permission->id }}" {{ in_array($offer_management_permission->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $offer_management_permission->id }}">
                            {{ $offer_management_permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Permissions</h5>
                @foreach($permissions as $permissions)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permissions->id }}" id="permission_{{ $permissions->id }}" {{ in_array($permissions->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $permissions->id }}">
                            {{ $permissions->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Roles</h5>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $role->id }}" id="permission_{{ $role->id }}" {{ in_array($role->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Users</h5>
                @foreach($users as $user)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $user->id }}" id="permission_{{ $user->id }}" {{ in_array($role->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $user->id }}">
                            {{ $user->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Page Settings</h5>
                @foreach($page_settings as $page_setting)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $page_setting->id }}" id="permission_{{ $page_setting->id }}" {{ in_array($page_setting->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $page_setting->id }}">
                            {{ $page_setting->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Listing Settings</h5>
                @foreach($listing_settings as $listing_setting)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $listing_setting->id }}" id="permission_{{ $listing_setting->id }}" {{ in_array($listing_setting->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $listing_setting->id }}">
                            {{ $listing_setting->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Option Services</h5>
                @foreach($option_services as $option_service)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $option_service->id }}" id="permission_{{ $option_service->id }}" {{ in_array($option_service->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $option_service->id }}">
                            {{ $option_service->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Advertisement</h5>
                @foreach($advertisements as $advertisement)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $advertisement->id }}" id="permission_{{ $advertisement->id }}" {{ in_array($advertisement->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $advertisement->id }}">
                            {{ $advertisement->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col-6 mt-2">
                <h5>Shipping</h5>
                @foreach($shippments as $shippment)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $shippment->id }}" id="permission_{{ $shippment->id }}" {{ in_array($shippment->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="permission_{{ $shippment->id }}">
                            {{ $shippment->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2 mb-2">Update</button>
    </form>
</div>
@endsection