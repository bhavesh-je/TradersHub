@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ Route('video-post.index') }}">Video posts</a></li>
    <li>Create Video Post</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Video Post</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('video-post.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_type" value="post">
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="name" class="form-label"><strong>Post name</strong></label>
                        </div>
                    </div>
                    <input type="text" class="form-control custom-control @error('post_name') danger-box @enderror" placeholder="Enter post name" id="post_name" name="post_name" value="{{ old('post_name') }}">
                    @error('post_name')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="post_content" class="form-label"><strong>Post content</strong></label>
                        </div>
                    </div>
                    <textarea id="post_content" name="post_content" class="form-control custom-control @error('post_content') danger-box @enderror" rows="3" placeholder="Write content ...">{{ old('post_content') }}</textarea>
                    @error('post_content')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="name" class="form-label"><strong>Youtube link</strong></label>
                        </div>
                    </div>
                    <input type="text" class="form-control custom-control @error('youtube_video_link') danger-box @enderror" placeholder="Enter youtube video link" id="youtube_video_link" name="youtube_video_link" value="{{ old('youtube_video_link') }}">
                    @error('youtube_video_link')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="post_content" class="form-label"><strong>Video link</strong></label>
                        </div>
                    </div>
                    <input type="file" class="file" accept="image/*" name="post_video_name">
                    
                    <div class="input-group">
                        <input type="text" class="form-control custom-control @error('youtube_video_link') danger-box @enderror" disabled placeholder="Upload video" id="file">
                        <div class="input-group-append">
                            <button type="button" class="browse butn-primary">Browse</button>
                            <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                        </div>
                    </div>
                    @error('post_video_name')
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                    <div class="post_img_prv" style="display:none;">
                        <img src="" alt="" id="preview-image-before-upload" style="max-height: 150px;">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="post_status" class="form-label"><strong>Post status</strong></label>
                        </div>
                    </div>
                    <div class="switches">
                        <label class="switch-2">
                            <input type="checkbox" name="post_status" class="post_status">
                            <span class="slider-2">
                                <i class="fas fa-check"></i>
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="switch-text">Publish</span>
                        </label>
                    </div>
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
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    tinymce.init({
        selector: 'textarea#post_content', // Replace this CSS selector to match the placeholder element for TinyMCE
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
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
        
            var reader = new FileReader();
            reader.onload = function(e) {
            // get loaded data and render thumbnail.
            // document.getElementById("preview").src = e.target.result;
                $('#preview-image-before-upload').attr('src', e.target.result);
                $('.post_img_prv').show();
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        
        // $('#post_image').change(function(){
        //     let reader = new FileReader();
        //     reader.onload = (e) => { 
        //     $('#preview-image-before-upload').attr('src', e.target.result); 
        //     }
        //     reader.readAsDataURL(this.files[0]); 
        // });
        $(".post_status").on('click',function(){
            if($(this).is(':checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        });

    });
</script>
@endsection