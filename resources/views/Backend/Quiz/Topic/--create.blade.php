@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Quize</li>
    <li class="breadcrumb-item active">Topics</li>
    <li class="breadcrumb-item active">Create Topic</li>
@endsection
@section('content')
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Topic</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('topics.store') }}">
            @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="topic_subscription">Topic for</label>
                            <select class="form-control" id="topic_subscription" name="topic_subscription">
                                <option value="3">Basic</option>
                                <option value="1">Master</option>
                                <option value="2">Standard</option>
                            </select>
                            @error('topic_subscription')
                                <span id="topic_subscription-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="topic_name">Topic</label>
                            <input type="text" class="form-control @error('topic_name') is-invalid @enderror" id="topic_name" name="topic_name" placeholder="Enter topic" value="{{ old('topic') }}">
                            @error('topic_name')
                                <span id="topic_name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" placeholder="duration" value="{{ old('duration') }}">
                            @error('duration')
                            <span id="duration-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="duration">Duration Measure</label>
                        <select class="form-control" name="duration_measure">
                            <option value="minutes">Minutes</option> 
                            <option value="hours">Hours</option> 
                            <option value="days">Days</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="passing_grade">Passing grade (%)</label>
                            <input type="number" class="form-control @error('passing_grade') is-invalid @enderror" id="passing_grade" step="0.1" name="passing_grade" placeholder="passing grade" value="{{ old('passing_grade') }}">
                            @error('passing_grade')
                            <span id="passing_grade-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="re_take_cut">Points total cut after re-take (%)
                            </label>
                            <input type="number" class="form-control @error('re_take_cut') is-invalid @enderror" id="re_take_cut" name="re_take_cut" placeholder="re take cut" value="{{ old('re_take_cut') }}">
                            @error('re_take_cut')
                            <span id="re_take_cut-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

