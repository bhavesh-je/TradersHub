@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">Create Roles</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Role</h3>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="form-group">
                    <label for="name">Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Enter name','class' => 'form-control', 'id' => 'name')) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Permissions:</label>
                    <div class="row">
                         @foreach($permission as $value)
                        <div class="col-sm-3">
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection