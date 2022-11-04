@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Options</a></li>
    <li class="breadcrumb-item active">Show option</li>
@endsection