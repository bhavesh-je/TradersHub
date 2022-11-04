@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Quize</li>
    <li class="breadcrumb-item active">Topics</li>
    <li class="breadcrumb-item active">Edit Topic</li>
@endsection
@section('content')
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Topic</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('topics.update', $topic->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="topic_subscription">Topic for</label>
                        <select class="form-control" id="topic_subscription" name="topic_subscription">
                            <option value="3" @if( $topic->topic_subscription == 3 ) selected @endif>Basic</option>
                            <option value="1" @if( $topic->topic_subscription == 1 ) selected @endif>Master</option>
                            <option value="2" @if( $topic->topic_subscription == 2 ) selected @endif>Standard</option>
                        </select>
                        @error('topic_subscription')
                            <span id="topic_subscription-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="topic_name">Topic</label>
                        <input type="text" class="form-control @error('topic_name') is-invalid @enderror" id="topic_name" name="topic_name" placeholder="Enter topic" value="{{ $topic->topic_name }}">
                        @error('topic_name')
                            <span id="topic_name-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" placeholder="duration" value="{{ $topic->duration }}">
                        @error('duration')
                        <span id="duration-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="duration">Duration Measure</label>
                    <select class="form-control" name="duration_measure">
                        <option value="minutes" @if( $topic->duration_measure == 'minutes' ) selected @endif>Minutes</option> 
                        <option value="hours" @if( $topic->duration_measure == 'hours' ) selected @endif>Hours</option> 
                        <option value="days" @if( $topic->duration_measure == 'days' ) selected @endif>Days</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="passing_grade">Passing grade (%)</label>
                        <input type="number" class="form-control @error('passing_grade') is-invalid @enderror" id="passing_grade" step="0.1" name="passing_grade" placeholder="passing grade" value="{{ $topic->passing_grade }}">
                        @error('passing_grade')
                        <span id="passing_grade-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="re_take_cut">Points total cut after re-take (%)
                        </label>
                        <input type="number" class="form-control @error('re_take_cut') is-invalid @enderror" id="re_take_cut" name="re_take_cut" placeholder="re take cut" value="{{ $topic->re_take_cut }}">
                        @error('re_take_cut')
                        <span id="re_take_cut-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

