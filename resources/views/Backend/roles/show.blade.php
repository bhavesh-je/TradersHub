@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">Show Roles</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-style4">
        <div class="card-header">Role details</div>
            <div class="card-body">
                <div>
                    <label for="permissions" class="form-label"><strong>Name :</strong></label>
                    {{ $role->name }}
                </div>
                <div>
                    <label for="permissions" class="form-label"><strong>Permissions :</strong></label>
                    @foreach($role->permissions as $v)
                        <label class="badge glow-info bg-info mt-3">{{ $v->name }}</label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection