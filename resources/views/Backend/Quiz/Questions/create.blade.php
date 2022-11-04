@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li><a href="{{route('questions.index')}}">Quize</a></li>
    <li><a href="{{route('questions.index')}}">Questions</a></li>
    <li>Create Questions</li>
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
            <h3 class="card-title">Create Question</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
            @csrf
            @php $que_id = $questions + 1; @endphp
            <input type="hidden" name="que_id" id="que_id" value="{{ $que_id }}"/>
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
                                    <option value="single">Single</option>
                                    <option value="multiple">Multiple</option>
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
                        <textarea id="question" name="question" class="form-control custom-control @error('question') danger-box @enderror" placeholder="Write question...">{{ old('question') }}</textarea>
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
                        <input type="file" class="file" name="que_img" id="que_img">
                        <div class="input-group">
                            <input type="text" class="form-control custom-control" disabled placeholder="Upload File" id="file">
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
                                <input type="checkbox" name="opt_img" class="opt_img" value="0"> 
                                <span class="slider-2">
                                    <i class="fas fa-check"></i>
                                    <i class="fas fa-times"></i>
                                </span>
                                <span class="switch-text"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 que-img-section" style="display:none;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="que_img" class="form-label"><strong>Preview Image</strong></label>
                            </div>
                        </div>
                        <div class="preview-img"></div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary custom-btn">Create</button>
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

        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

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
    });

    tinymce.init({
        selector: 'textarea#question', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
    
    // Select2Ajax
    

    // $('input[type="file"]').on("change",function(e) {
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
        $("#file").val(f.name);
        if (extension === 'jpg' || extension === 'png') {
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
                var file = e.target;
                $('.preview-img').append("<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='max-height: 250px;'>" +
                    "<br/><button type=\"button\" class=\"btn btn-danger custom-btn remove-que-img\" title=\"Remove image\"><i class=\"fas fa-times\"></i></button>" +
                    "</span>");
                $(".remove-que-img").click(function(){
                    $(this).parent(".pip").remove();
                    e.target.value = ''
                    $('#que_img').attr('value', '');
                    $('#file').val('');
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

    $('.dur_minus, .pass_minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.dur_plus, .pass_plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
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
</script>
@endsection