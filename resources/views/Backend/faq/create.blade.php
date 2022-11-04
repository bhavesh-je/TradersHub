@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('faq.index') }}">FAQs</a></li>
    <li>Create FAQ</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create FAQ</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="Question" class="form-label"><strong>Question</strong></label>
                        </div>
                    </div>

                    <input type="text" class="form-control custom-control @error('question') danger-box @enderror" placeholder="Enter question" id="question" name="question" value="{{ old('question') }}">
                    @error('question')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="Answer" class="form-label"><strong>Answer</strong></label>
                        </div>
                    </div>
                    <textarea id="answer" name="answer" class="form-control custom-control @error('answer') danger-box @enderror" rows="3" placeholder="Write answer ...">{{ old('answer') }}</textarea>
                    @error('answer')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary custom-btn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#answer', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
@endsection