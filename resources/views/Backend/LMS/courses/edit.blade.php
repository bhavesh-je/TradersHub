@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">LMS</li>
    <li class="breadcrumb-item active">Courses</li>
    <li class="breadcrumb-item active">Edit Courses</li>
@endsection
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Course</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('courses.update', $course->id) }}">
            @csrf
            @method('PUT')
                <div class="row">
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="course_subscription">Course for</label>
                            <select class="form-control" id="course_subscription" name="course_subscription">
                                <option value="3" @if( $course->course_subscription == 3 ) selected @endif>Basic</option>
                                <option value="1" @if( $course->course_subscription == 1 ) selected @endif>Master</option>
                                <option value="2" @if( $course->course_subscription == 2 ) selected @endif>Standard</option>
                            </select>
                            @error('course_subscription')
                                <span id="course_subscription-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="course_name">Course name</label>
                            <input type="text" class="form-control @error('course_name') is-invalid @enderror" id="course_name" name="course_name" placeholder="Enter name" value="{{ ($course->course_name) }}">
                            @error('course_name')
                                <span id="course_name-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="course_content">Course content</label>
                            <textarea id="course_content" name="course_content" class="form-control" rows="3" placeholder="Write content ...">{{ ($course->course_content) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="course_video_link">Course video link</label>
                            <input type="text" class="form-control" id="course_video_link" name="course_video_link" placeholder="Enter vido link" value="{{ ($course->course_video_link) }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="course_price">Course price</label>
                            <input type="text" class="form-control @error('course_price') is-invalid @enderror" id="course_price" name="course_price" placeholder="Enter price" value="{{ ($course->course_price) }}">
                            @error('course_price')
                                <span id="course_price-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="course_sale_price">Course sale price</label>
                            <input type="text" class="form-control @error('course_sale_price') is-invalid @enderror" id="course_sale_price" name="course_sale_price" placeholder="Enter sell price" value="{{ ($course->course_sale_price) }}">
                            @error('course_sale_price')
                                <span id="course_sale_price-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="expiration" name="expiration" @if($course->expiration == 1) value="1" checked @else value="0" @endif>
                            <label for="expiration">Course time limit</label>
                        </div>
                    </div>
                    <div class="col-md-3" id="course_expire_days_div" @if($course->expiration == 1 && $course->course_expiration_day) style="display: block;" @else style="display: none;" @endif>
                        <div class="form-check">
                            <label for="course_expiration_day">Course expiration (days)</label>
                            <input type="text" class="form-control" id="course_expiration_day" name="course_expiration_day" placeholder="Enter days" value="{{ ($course->course_expiration_day) }}">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-check">
                            <label for="">Course categories</label>
                            <ul>
                                @foreach ($categories as $category)
                                    <input class="form-check-input" type="checkbox" id="cat_id-{{ $category->id }}" name="cat_id[]" value="{{ $category->id }}" @if(!empty($course->cat_id) && $course->cat_id != "null") @if(in_array($category->id, json_decode($course->cat_id))) checked @endif @endif> 
                                    <label for="cat_id-{{ $category->id }}">{{ $category->c_c_name }}</label>
                                    <ul>
                                        @foreach ($category->childrenCourseCategories as $childCategory)
                                            @include('Backend.LMS.courses.edit-child-categories', ['child_category' => $childCategory])
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
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
        selector: 'textarea#course_content', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });

    $(function () {
        $('#expiration').on('click', function(){
            if ($(this).is(":checked")) {
                $(this).val(1);
              $('#course_expire_days_div').show();
            }else{
                $(this).val(0);
                $('#course_expiration_day').val('');
                $('#course_expire_days_div').hide();
            }
        });
    });

 </script>
@endsection