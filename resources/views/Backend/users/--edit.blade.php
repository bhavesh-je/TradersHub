@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Edit User</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="{{ $user->name }}">
                            @error('name')
                                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}">
                            @error('email')
                                <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter password">
                            @error('password')
                                <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror" id="confirm-password" name="confirm-password" placeholder="Enter confirm password">
                            @error('confirm-password')
                                <span id="confirm-password-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="roles">Role</label>
                            <select class="form-control" id="roles" name="roles">
                                @foreach( $roles as $role )
                                    <option value="{{ $role }}" @if(in_array($role, $userRole)) selected @endif>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span id="roles-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>


            <!-- {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control', 'id' => 'name')) !!}
            </div>
             <div class="form-group">
                <label for="email">Email</label>
                {!! Form::text('email', null, array('placeholder' => 'Enter email','class' => 'form-control', 'id' => 'email')) !!}
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                {!! Form::password('password', array('placeholder' => 'Enter password','class' => 'form-control', 'id' => 'password')) !!}
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control', 'id' => 'confirm-password')) !!}
            </div>

            <div class="form-group">
                <label for="roles">Role</strong>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple', 'id' => 'roles')) !!}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!} -->
        </div>
    </div>
</div>
@endsection