@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">LMS</li>
    <li class="breadcrumb-item active">Course Categories</li>
    <li class="breadcrumb-item active">Edit Course Category</li>
@endsection
@section('content')
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Course Categroy</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('course-category.update', $EditCourseCat->id) }}">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="c_c_name">Course category name</label>
                            <input type="text" class="form-control @error('c_c_name') is-invalid @enderror" id="c_c_name" name="c_c_name" placeholder="Enter name" value="{{ $EditCourseCat->c_c_name }}">
                            @error('c_c_name')
                                <span id="c_c_name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Write content ...">{{ $EditCourseCat->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select class="custom-select rounded-0" id="parent" name="parent">
                                <option value="">Select parent category</option>
                                @foreach($C_cats as $key => $C_cat)
                                <option value="{{ $C_cat->id }}" @if($EditCourseCat->parent == $C_cat->id) selected @endif>{{ $C_cat->c_c_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
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