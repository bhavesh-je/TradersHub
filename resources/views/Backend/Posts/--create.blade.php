@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ Route('posts.index') }}">Posts</a></li>
    <li class="breadcrumb-item active">Create Post</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Post</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="custome-form">
                @csrf
                <div class="form-group">
                    <label for="" class="">Post Title</label>
                    <input type="text" class="form-control @error('post_title') is-invalid @enderror" placeholder="Enter Topic" name="post_title" value="{{ old('post_title') }}">
                    @error('post_title')
                        <span id="post_title-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="course_content">Post content</label>
                        <textarea id="course_content" name="post_content" class="form-control @error('post_content') is-invalid @enderror" rows="3" placeholder="Write content ...">{{ old('post_content') }}</textarea>
                        @error('post_content')
                            <span id="post_content-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="customFile">Post Image :</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="post_image" id="post_image" >
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div>
                        <img src="" alt="" id="preview-image-before-upload" style="max-height: 125px;">
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input post_status" name="post_status" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Publish</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    tinymce.init({
        selector: 'textarea#course_content', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
<script>
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
</script>
<script>
    $('.post_status').val(0);
    console.log("Testing "+$('.post_status').val()); 
    $(document).ready(function () {
        $('#post_image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
        $(".post_status").on('click',function(){
            if($('.post_status').is(':checked')){
                $('.post_status').val(1);
            }else{
                $('.post_status').val(0);
            }
        });

    });
</script>
@endsection