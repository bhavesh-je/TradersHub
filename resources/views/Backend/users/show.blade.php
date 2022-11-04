@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active">{{$user->name}}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-style4">
        <div class="card-header">{{ $user->name }} details</div>
            <div class="card-body">
                <div>
                    <label for="permissions" class="form-label"><strong>Name :</strong></label>
                    {{ $user->name }}
                </div>
                <div>
                    <label for="permissions" class="form-label"><strong>Email :</strong></label>
                    {{ $user->email }}
                </div>
                <div>
                    <label for="Portfolio Website Url" class="form-label"><strong>Portfolio Website Url :</strong></label>
                    {{ $user->portfolio_website_url }}
                </div>
                <div>
                    <label for="Details" class="form-label"><strong>Details :</strong></label>
                    {{ $user->details }}
                </div>
                <div>
                    <label for="permissions" class="form-label"><strong>Roles :</strong></label>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge glow-success bg-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
                <div>
                    <label for="permissions" class="form-label"><strong>Permissions :</strong></label>
                    @if(!empty($user->getAllPermissions()))
                        @foreach($user->getAllPermissions() as $permission)
                            <label class="badge glow-info bg-info">{{ $permission->name }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection