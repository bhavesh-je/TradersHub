@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('questions.index') }}">Quize</a></li>
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Questions</a></li>
    <li class="breadcrumb-item active">Create Option</li>
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
        
        <div class="card-header">
            <h3 class="card-title">Create Option</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('option.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="is_opt_img" value="{{ $question->opt_img }}"/>
                <div class="row">
                    {{-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="que_id">Question</label>
                            <select class="form-control" id="opt_type" name="opt_type">
                                <option value="single">Single</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="que_id">Question</label>
                            <select class="form-control questions @error('que_id') is-invalid @enderror" name="que_id">
                                @if ( $question )
                                    <option value="{{ $question->id }}"> {{ $question->question }} </option>
                                @endif
                            </select>
                            @error('que_id')
                                <span id="que_id-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="single_choice_ans">Options</label>
                        {{-- <span class="float-right">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="is_image_opt" value="0">
                                <label for="customCheckbox1" class="custom-control-label">Option image</label>
                              </div>
                        </span> --}}
                        <div class="row">
                            @if( $question->que_type == 'single' )
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="col-md-6">
                                        @if( $question->opt_img == 0 )
                                            <div class="form-group">
                                                <div class="input-group _single_ans">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <input type="radio" class="single_choice_0" name="single_choice_0" onclick="selectOption({{$i}})" value="{{ $opt_count->id + $i }}" data-id="0">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="single_choice_ans" class="form-control @error('single_choice_ans') is-invalid @enderror" name="single_choice_ans[]">
                                                </div>
                                            </div>
                                        @else    
                                            <div class="form-group _single_ans_img">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <input type="radio" class="single_choice_0" name="single_choice_0" onclick="selectOption({{$i}})" value="{{ $opt_count->id + $i }}" data-id="0">
                                                        </span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input opt-img" id="opt_img-{{$i}}" name="single_choice_ans_img[]">
                                                        <label class="custom-file-label" for="que_img">Choose file</label>
                                                    </div>
                                                </div>
                                                @error('que_img')
                                                    <span id="que_img-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endif    
                                    </div>
                                @endfor
                            @else
                                @for ($i = 1; $i <= 4; $i++)
                                    <div class="col-md-6">
                                        @if( $question->opt_img == 0 )
                                            <div class="form-group">
                                                <div class="input-group _single_ans">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <input type="checkbox" class="" name="multi_choice_0[]" onclick="selectOption({{$i}})" value="{{ $$opt_count->id + $i }}" data-id="0">
                                                        </span>
                                                    </div>
                                                    <input type="text" id="single_choice_ans" class="form-control @error('single_choice_ans') is-invalid @enderror" name="single_choice_ans[]">
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-group _single_ans_img">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <input type="checkbox" class="" name="multi_choice_0[]" onclick="selectOption({{$i}})" value="{{ $opt_count->id + $i }}" data-id="0">
                                                        </span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input opt-img" id="opt_img-{{$i}}" name="single_choice_ans_img[]">
                                                        <label class="custom-file-label" for="que_img">Choose file</label>
                                                    </div>
                                                </div>
                                                @error('que_img')
                                                    <span id="que_img-error" class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>         
                                        @endif
                                    </div>
                                @endfor    
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
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

        $(function () {
            bsCustomFileInput.init();
        });

        // Select2Ajax
        $('.questions').select2({
            placeholder: "Choose topic...",
            theme: 'bootstrap4',
            minimumInputLength: 3,
            ajax: {
                url: '{{ route("getQuestions") }}',
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

            $container.find(".select2-result-repository__title").text(repo.question);

            return $container;
        }

        function formatRepoSelection (repo) {
            return repo.question || repo.text;
        }

        // Add and remove dynamic input groups for answer

        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var que_id = $('#que_id').val();
        $('#opt_type').on('change', function(){
            var type = $(this).val();
            if( type == 'multiple' ) {
                $('.multi_ans').show();
                $('._multi_ans').show();
                $('.single_ans').hide();
                $('._single_ans').hide();
            } else {
                $('.multi_ans').hide();
                $('._multi_ans').hide();
                $('.single_ans').show();
                $('._single_ans').show();
            }
        });

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                 //text box increment
                // console.log(x);
                if($('#opt_type').val() == 'multiple'){
                    $(wrapper).append('<div class="form-group _multi_ans"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="checkbox" name="multi_choice[]"></span></div><input type="text" id="multi_choice_ans" class="form-control" name="multi_choice_ans[]"><button type="button" class="btn btn-tool text-danger remove_field"><i class="fas fa-times"></i></button></div></div>'); //add input box
                } else {
                    $(wrapper).append('<div class="form-group _single_ans"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><input type="radio" class="single_choice_0" name="single_choice_0[]" onclick="selectOption('+x+')" value="0" data-id="'+x+'"></span></div><input type="text" id="single_choice_ans" class="form-control" name="single_choice_ans[]"><button type="button" class="btn btn-tool text-danger remove_field"><i class="fas fa-times"></i></button></div></div>'); //add input box
                }
                x++;
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
        
    });

    function selectOption(id) {
        var opt = id;
        var radios = $("input[type=radio]");
        
        $('input[name="single_choice_0[]"]').each(function () {
            if($(this).is(':checked')){
                $(this).val(1);
            }else{
                $(this).val(0);
            }
        });
    }

    // $('#customCheckbox1').on('click', function(){
    //     let isChecked = $(this).is(':checked');
    //     if( isChecked ){
    //         $(this).val(1);
    //         $('._single_ans_img').show();
    //         $('._single_ans').hide();
    //     } else {
    //         $(this).val(0);
    //         $('._single_ans').show();
    //         $('._single_ans_img').hide();
    //     }
    // });
</script>
@endsection