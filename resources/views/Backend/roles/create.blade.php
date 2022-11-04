@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('roles.index') }}">Roles</a></li>
    <li>Create Roles</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Role</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="name" class="form-label"><strong>Name</strong></label>
                        </div>
                    </div>

                    <input type="text" id="name" name="name" class="form-control custom-control @error('name') danger-box @enderror " placeholder="Enter name">
                    @error('name')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                    {{-- <span class="error text-danger" role="alert">
                        Caption text, description, error notification
                    </span> --}}
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="permissions" class="form-label"><strong>Permissions</strong></label>
                        </div>
                    </div>
                    <div class="form-check mb-2">
                        <div class="row">
                            @foreach($permission as $value)
                                <div class="col-sm-3">
                                    <input class="form-check-input ms-0" name="permission[]" type="checkbox" value="{{$value->id}}" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">{{ $value->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                        <button type="submit" class="btn btn-primary custom-btn">Create</button>
                    </div>
                    {{-- <span class="error text-danger" role="alert">
                        Caption text, description, error notification
                    </span> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection