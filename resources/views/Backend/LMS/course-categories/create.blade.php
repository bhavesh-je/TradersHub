@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('course-category.index') }}">LMS</a></li>
    <li><a href="{{ route('course-category.index') }}">Course Categories</a></li>
    <li>Create Course Category</li>
@endsection
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Permission</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('course-category.store') }}">
                @csrf
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="c_c_name" class="form-label"><strong>Course category name</strong></label>
                        </div>
                    </div>
                    <input type="text" class="form-control custom-control @error('c_c_name') danger-box @enderror" id="c_c_name" name="c_c_name" placeholder="Enter category name" value="{{ old('c_c_name') }}" oninput="this.value = this.value.toLowerCase()">
                    @error('c_c_name')
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="description" class="form-label"><strong>Description</strong></label>
                        </div>
                    </div>
                    <textarea id="description" name="description" class="form-control custom-control" rows="3" placeholder="Write description...">{{ old('description') }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="description" class="form-label"><strong>Parent category</strong></label>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4">
                        <div class="col-sm-12">
                            <select class="form-select custome-select" aria-label="Default select example" id="parent" name="parent">
                                <option value="">Select parent category</option>
                                @foreach($C_cats as $key => $C_cat)
                                    <option value="{{ $C_cat->id }}">{{ $C_cat->c_c_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
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
        selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
 </script>
@endsection