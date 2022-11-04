@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">Show Roles</li>
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
                {{ $role->name }}
            </div>
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($role->permissions))
                @foreach($role->permissions as $v)
                    <label class="badge badge-info">{{ $v->name }}</label>
                @endforeach
            @endif
            </div>
        </div>
    </div>
</div>
@endsection