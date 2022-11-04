@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('permissions.index') }}">Role Management</a></li>
    <li>Create Permission</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Permission</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="name" class="form-label"><strong>Permission name</strong></label>
                        </div>
                    </div>

                    <input type="text" class="form-control custom-control @error('name') danger-box @enderror" id="name" name="name" placeholder="Enter permission name" value="{{ $permission->name }}" oninput="this.value = this.value.toLowerCase()">
                    @error('name')
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary custom-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection