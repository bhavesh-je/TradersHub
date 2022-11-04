@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('questions.index') }}">Quize</a></li>
    <li><a href="{{ route('questions.index') }}">Questions</a></li>
    <li>Edit Question</li>
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('traders-assets/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('traders-assets/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Question</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <input type="hidden" name="que_id" id="que_id" value=""/>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="que_type" class="form-label"><strong>Question type</strong></label>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <select class="form-select custome-select @error('que_type') danger @enderror" aria-label="Default select example" id="que_type" name="que_type">
                                    <option value="single" {{ ($question->que_type == 'single' ? 'selected' : '') }}>Single</option>
                                    <option value="multiple" {{ ($question->que_type == 'multiple' ? 'selected' : '') }}>Multiple</option>
                                </select>
                            </div>
                        </div>
                        @error('que_type')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="topic_id" class="form-label"><strong>Topic</strong></label>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <select class="form-select custome-select topics @error('topic_id') danger-box @enderror" aria-label="Default select example" id="topic_id" name="topic_id">
                                    @if( $question->topics )
                                        <option value="{{ $question->topics->id }}"> {{ $question->topics->topic_name }} </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        @error('topic_id')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="duration" class="form-label"><strong>Question</strong></label>
                            </div>
                        </div>
                        <textarea id="question" name="question" class="form-control custom-control @error('question') danger-box @enderror" placeholder="Write question...">{{ $question->question }}</textarea>
                        @error('question')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="que_img" class="form-label"><strong>Question Image</strong></label>
                            </div>
                        </div>
                       
                        <input type="file" class="file" accept="image/*" name="que_img" id="que_img">
                        <div class="input-group">
                            <input type="text" class="form-control custom-control" disabled placeholder="Upload File" id="file" value="{{ $question->que_img }}">
                            <div class="input-group-append">
                                <button type="button" class="browse butn-primary">Browse</button>
                                <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                            </div>
                        </div>
                        
                        @error('que_img')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="opt_img" class="form-label"><strong>Image for Option</strong></label>
                            </div>
                        </div>
                        <div class="switches">
                            <label class="switch-2">
                                <input type="checkbox" id="opt_img" name="opt_img" class="opt_img" {{  ($question->opt_img == 1 ? ' checked' : '') }} value="{{ $question->opt_img }}"> 
                                <span class="slider-2">
                                    <i class="fas fa-check"></i>
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="switch-text"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 que-img-section" style="{{ !empty($question->que_img) ? '' : 'display:none;' }}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="que_img" class="form-label"><strong>Preview Image</strong></label>
                            </div>
                        </div>
                        <div class="preview-img">
                            @if(!empty($question->que_img))
                            <span class="pip">
                                <img class="imageThumb" src="{{ asset('uploads/que-img/'.$question->que_img) }}" title="" style='max-height: 250px;'>
                                {{-- <span class="badge badge2 glow-danger bg-danger remove-que-img" title="Remove image"><i class="fas fa-times"></i></span> --}}
                                <button type="button" class="btn btn-danger custom-btn remove-que-img" title="Remove image"><i class="fas fa-times"></i></button>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary custom-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('traders-assets/js/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        // $('input[type="file"]').change(function(e) {
        //     var fileName = e.target.files[0].name;
        //     $("#file").val(fileName);
        
        //     var reader = new FileReader();
        //     reader.onload = function(e) {
        //     // get loaded data and render thumbnail.
        //     // document.getElementById("preview").src = e.target.result;
        //         $('#preview-image-before-upload').attr('src', e.target.result);
        //         $('.post_img_prv').show();
        //     };
        //     // read the image file as a data URL.
        //     reader.readAsDataURL(this.files[0]);
        // });

        //Function for preview image 
        $("#que_img").on("change", function(e) {
            var files = e.target.files, filesLength = files.length;
            var f = files[0]
            let extension = f.name.match(/(?<=\.)\w+$/g)[0].toLowerCase();
            if (extension === 'jpg' || extension === 'png') {
                $("#file").val(f.name);
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    // $('.preview-img').append("<span class=\"pip\">" +
                    //     "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='max-height: 250px;'>" +
                    //     "<br/><button type=\"button\" class=\"btn btn-danger custom-btn remove-que-img\" title=\"Remove image\"><i class=\"fas fa-times\"></i></button>" +
                    //     "</span>");
                    $('.imageThumb').attr('src', e.target.result);
                    $(".remove-que-img").click(function(){
                        $(this).parent(".pip").remove();
                        e.target.value = ''
                        $('#que_img').attr('value', '');
                        $('.que-img-section').hide();
                    });
                });
                fileReader.readAsDataURL(f);
                $('.que-img-section').show();
            }else{
                e.target.value = '';
                alert('Wrong file extension! Please upload only jpg, jpeg, png image.');
                $('.que-img-section').hide();
            }
        });

        $(".remove-que-img").click(function(e){
            $.ajax({
                url : '{{ route("uploadOptImg") }}',
                type: 'POST',
                data: {
                    "id" : {{ $question->id }},
                    "img" : '{{ $question->que_img }}',
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response){
                    console.log(response);
                }
            });

            $(this).parent(".pip").remove();
            e.target.value = ''
            $('#file').val('');
            $('#que_img').attr('value', '');
            $('.que-img-section').hide();
        });

        $(".opt_img").on('click',function(){
            if($(this).is(':checked')){
                $(this).val(1);
                $(this).attr('checked', true);
            }else{
                $(this).val(0);
                $(this).attr('checked', false);
            }
        });
        
    });
    
    tinymce.init({
        selector: 'textarea#question', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
    
    // Select2Ajax
    $('.topics').select2({
        placeholder: "Choose topic...",
        theme: 'bootstrap4',
        minimumInputLength: 3,
        ajax: {
            url: '{{ route("getTopics") }}',
            type: 'post',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    _token: "{{ csrf_token() }}",
                    search: $.trim(params.term),
                    type: 'public'
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });

    function formatRepo (repo) {
        if (repo.loading) {
            return repo.text;
        }

        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title'></div>" +
                "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.topic_name);

        return $container;
    }

    function formatRepoSelection (repo) {
        return repo.topic_name || repo.text;
    }

    if ( $("#topic_id").hasClass("danger-box") === true){
        $('.select2').addClass('danger-box');
    }else{
        $('.select2').removeClass('danger-box');
    }

    if( $("#question").hasClass("danger-box") === true ){
        $('.tox-tinymce').addClass('danger-box');
    }else{
        $('.tox-tinymce').removeClass('danger-box');
    }
</script>
@endsection