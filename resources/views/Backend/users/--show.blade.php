@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Show User</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Show Role</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($user->getAllPermissions()))
                    @foreach($user->getAllPermissions() as $permission)
                        <label class="badge badge-danger">{{ $permission->name }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection