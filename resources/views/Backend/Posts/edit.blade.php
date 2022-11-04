@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ Route('posts.index') }}">Posts</a></li>
    <li>Edit Post</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit post</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('posts.update', $editData->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="post_type" value="post">
            <input type="hidden" name="id" value="{{ $editData->id }}">
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="name" class="form-label"><strong>Post title</strong></label>
                        </div>
                    </div>

                    <input type="text" class="form-control custom-control @error('post_title') danger-box @enderror" placeholder="Enter post title" id="post_title" name="post_title" value="{{ $editData->post_title }}">
                    @error('post_title')
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
                    <textarea id="post_content" name="post_content" class="form-control custom-control @error('post_content') danger-box @enderror" rows="3" placeholder="Write content ...">{{ $editData->post_content }}</textarea>
                    @error('post_content')
                        {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                        <span class="error-text" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <label for="post_content" class="form-label"><strong>Post image</strong></label>
                        </div>
                    </div>
                    <input type="file" class="file" accept="image/*" name="post_image" value="{{ $editData->post_image }}">
                    <div class="input-group">
                        <input type="text" class="form-control custom-control" disabled placeholder="Upload File" id="file" value="{{ $editData->post_image }}">
                        <div class="input-group-append">
                            <button type="button" class="browse butn-primary">Browse</button>
                            <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                        </div>
                    </div>
                    <div class="post_img_prv" style={{ $editData->post_image ? '' : "display:none;"}}>
                        <img src="{{ asset('uploads/post-img/'.$editData->post_image) }}" alt="" id="preview-image-before-upload" style="max-height: 150px;">
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
                            <input type="checkbox" name="post_status" class="post_status" value="{{ $editData->post_status }}" {{ $editData->post_status == 1 ? 'checked' : '' }}>
                            <span class="slider-2">
                                <i class="fas fa-check"></i>
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="switch-text">Publish</span>
                        </label>
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
        
        $(".post_status").on('click',function(){
            if($(this).is(':checked')){
                $(this).val(1);
                $(this).attr('checked', true);
            }else{
                $(this).val(0);
                $(this).attr('checked', false);
            }
        });

    });
</script>
@endsection
