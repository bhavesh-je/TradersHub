@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ Route('video-post.index') }}">Video posts</a></li>
    <li class="breadcrumb-item active">Edit Video Post</li>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Video Post</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('video-post.update', $editVideoPost->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="" class="">Post name</label>
                    <input type="text" class="form-control @error('post_name') is-invalid @enderror" placeholder="Enter post name" name="post_name" value="{{ $editVideoPost->post_title }}">
                    @error('post_name')
                        <span id="post_name-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="">Youtube link</label>
                    <input type="text" class="form-control @error('youtube_video_link') is-invalid @enderror" placeholder="Enter youtube video link eg:" name="youtube_video_link" value="@if( $editVideoPost->youtube_video_link ) {{ $editVideoPost->youtube_video_link }} @endif">
                    @error('youtube_video_link')
                        <span id="youtube_video_link-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                
                <div class="form-group">
                    <label for="customFile">Video link</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('post_video_name') is-invalid @enderror" name="post_video_name" id="post_video_name" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        @error('post_video_name')
                        <span id="post_video_name-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="">Video preview @if($editVideoPost->youtube_video_link) {{ '(Youtube video)' }} @else {{ ('(Local video)') }} @endif</label>
                    <div>
                        @if( $editVideoPost->youtube_video_link )
                            <iframe width="50%" height="315" src="{{ $editVideoPost->youtube_video_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                        @else
                            <video width="50%" height="315" controls>
                                <source src="{{ asset($editVideoPost->post_video_name) }}" type="video/mp4">
                            </video>
                        @endif
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