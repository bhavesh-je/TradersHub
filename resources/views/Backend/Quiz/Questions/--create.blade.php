@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('topics.index')}}">Quize</a></li>
    <li class="breadcrumb-item"><a href="{{route('questions.index')}}">Questions</a></li>
    <li class="breadcrumb-item active">Create Questions</li>
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('css/Backend/custom.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <form method="POST" action="{{ route('questions.store') }}" enctype="multipart/form-data">
            @csrf
            @php $que_id = $questions + 1; @endphp
            <input type="hidden" name="que_id" id="que_id" value="{{ $que_id }}"/>
            <div class="card-header">
                <h3 class="card-title">Create Question</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="que_type">Question type</label>
                            <select class="form-control" id="que_type" name="que_type">
                                <option value="single">Single</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="topic_id">Topic</label>
                            <select class="form-control topics @error('topic_id') is-invalid @enderror" name="topic_id">
                            </select>
                            @error('topic_id')
                                <span id="topic_id-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <textarea id="question" name="question" class="form-control @error('question') is-invalid @enderror" rows="3" placeholder="Write question">{{ old('course_content') }}</textarea>
                            @error('question')
                                <span id="question-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="que_img">Question Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="que_img" name="que_img">
                                <label class="custom-file-label" for="que_img">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('que_img')
                                <span id="que_img-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 que-img-section" style="display:none;">
                        <div class="form-group">
                            <label for="">Preview Image</label>
                        </div>
                        {{-- <img id="preview-image-before-upload" src="" alt="preview image" style="max-height: 250px;">
                        <button type="button" class="btn btn-tool text-danger remove-que-img" title="Remove image"><i class="fas fa-times"></i></button> --}}
                        <div class="preview-img"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="que_img">Option Image</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="opt_img" value="0">
                                <label for="customCheckbox1" class="custom-control-label">Option image</label>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="question-img">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('js')
<!-- Select2 -->
<script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

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
        
        $(function () {
            bsCustomFileInput.init();
        });
        
    });

    $('#customCheckbox1').on('click', function(){
        let isChecked = $(this).is(':checked');
        if( isChecked ){
            $(this).val(1);
        } else {
            $(this).val(0);
        }
    });

    //Function for preview image 
    $("#que_img").on("change", function(e) {
        var files = e.target.files, filesLength = files.length;
        var f = files[0]
        let extension = f.name.match(/(?<=\.)\w+$/g)[0].toLowerCase();
        if (extension === 'jpg' || extension === 'png') {
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
                var file = e.target;
                $('.preview-img').append("<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='max-height: 250px;'>" +
                    "<br/><button type=\"button\" class=\"btn btn-tool text-danger remove-que-img\" title=\"Remove image\"><i class=\"fas fa-times\"></i></button>" +
                    "</span>");
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
</script>
@endsection

