@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">FAQs</a></li>
    <li class="breadcrumb-item active">Edit FAQ</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit FAQ</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('faq.update', $faq->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control @error('question') is-invalid @enderror" id="question" name="question" placeholder="Enter question" value="{{ $faq->question }}">
                            @error('question')
                                <span id="question-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea id="answer" name="answer" class="form-control @error('answer') is-invalid @enderror" rows="3" placeholder="Write answer">{{ $faq->answer }}</textarea>
                            @error('answer')
                                <span id="question-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection