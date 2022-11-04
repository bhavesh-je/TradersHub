@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('courses.index') }}">LMS</a></li>
    <li><a href="{{ route('courses.index') }}">Courses</a></li>
    <li>Edit Courses</li>
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
                    <div class="col-md-2 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_subscription" class="form-label"><strong>Course for</strong></label>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <select class="form-select custome-select @error('course_subscription') danger @enderror" aria-label="Default select example" id="course_subscription" name="course_subscription">
                                    <option value="3" @if( $course->course_subscription == 3 ) selected @endif>Basic</option>
                                    <option value="1" @if( $course->course_subscription == 1 ) selected @endif>Master</option>
                                    <option value="2" @if( $course->course_subscription == 2 ) selected @endif>Standard</option>
                                </select>
                            </div>
                        </div>
                        @error('course_subscription')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="name" class="form-label"><strong>Course name</strong></label>
                            </div>
                        </div>
    
                        <input type="text" class="form-control custom-control @error('course_name') danger-box @enderror" placeholder="Enter post title" id="course_name" name="course_name" value="{{ ($course->course_name) }}">
                        @error('course_name')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_content" class="form-label"><strong>Course content</strong></label>
                            </div>
                        </div>
                        <textarea id="course_content" name="course_content" class="form-control custom-control @error('course_content') danger-box @enderror" rows="3" placeholder="Write course content ...">{{ ($course->course_content) }}</textarea>
                        @error('course_content')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_video_link" class="form-label"><strong>Course video link</strong></label>
                            </div>
                        </div>
                        <input type="text" class="form-control custom-control @error('course_video_link') danger-box @enderror" placeholder="Enter youtube video link" id="course_video_link" name="course_video_link" value="{{ ($course->course_video_link) }}">
                        @error('course_video_link')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_price" class="form-label"><strong>Course price</strong></label>
                            </div>
                        </div>
                        <input type="text" class="form-control custom-control @error('course_price') danger-box @enderror" id="course_price" name="course_price" placeholder="Enter price" value="{{ ($course->course_price) }}">
                        @error('course_price')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_sale_price" class="form-label"><strong>Course sale price</strong></label>
                            </div>
                        </div>
                        <input type="text" class="form-control custom-control @error('course_sale_price') danger-box @enderror" id="course_sale_price" name="course_sale_price" placeholder="Enter sell price" value="{{ ($course->course_sale_price) }}">
                        @error('course_price')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div></div>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input ms-0" type="checkbox" id="expiration" name="expiration" @if($course->expiration == 1) value="1" checked @else value="0" @endif>
                            <label class="form-check-label" for="expiration">
                                Course time limit
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3" id="course_expire_days_div" @if($course->expiration == 1 && $course->course_expiration_day) style="display: block;" @else style="display: none;" @endif> 
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_expiration_day" class="form-label"><strong>Course expiration (days)</strong></label>
                            </div>
                        </div>
                        <input type="text" class="form-control custom-control @error('course_expiration_day') danger-box @enderror" id="course_expiration_day" name="course_expiration_day" placeholder="Enter days" value="{{ ($course->course_expiration_day) }}">
                        @error('course_expiration_day')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3"> 
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="" class="form-label"><strong>Course categories</strong></label>
                            </div>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                                <input class="form-check-input ms-0" type="checkbox" id="cat_id-{{ $category->id }}" name="cat_id[]" value="{{ $category->id }}" @if(!empty($course->cat_id) && $course->cat_id != "null") @if(in_array($category->id, json_decode($course->cat_id))) checked @endif @endif>
                                <label class="form-check-label" for="cat_id-{{ $category->id }}">
                                    {{ $category->c_c_name }}
                                </label>
                                <ul>
                                    @foreach ($category->childrenCourseCategories as $childCategory)
                                        @include('Backend.LMS.courses.edit-child-categories', ['child_category' => $childCategory])
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary custom-btn">Update</button>
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