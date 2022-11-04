@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('questions.index') }}">Quize</a></li>
    <li><a href="{{ route('questions.index') }}">Questions</a></li>
    <li>Create Option</li>
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
            <h3 class="card-title">Create Option</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('option.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="is_opt_img" value="{{ $question->opt_img }}"/>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="duration" class="form-label"><strong>Question</strong></label>
                            </div>
                        </div>
                        <input type="hidden" name="que_id" value="{{ $question->id }}">
                        <textarea id="question" name="question" class="form-control custom-control @error('question') danger-box @enderror" placeholder="Write question..." disabled>{{ $question->question }}</textarea>
                        @error('question')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    @if( $question->que_type == 'single' )
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <label for="que_img" class="form-label"><input type="radio" class="form-check-input single_choice_0 @error('single_choice_ans') danger @enderror" name="single_choice_0" onclick="selectOption({{$i}})" value="{{ $opt_count->id + $i }}" data-id="0"> <strong>Option {{$i}}</strong> </label>
                                    </div>
                                </div>
                                @if( $question->opt_img == 0 )
                                    {{-- <input type="text" id="single_choice_ans" class="form-control custom-control @error('single_choice_ans[]') danger-box @enderror" name="single_choice_ans[]"> --}}
                                    <textarea id="single_choice_ans" name="single_choice_ans[]" class="form-control custom-control single_choice_ans @error('single_choice_ans') danger-box @enderror" placeholder="Write answer..."></textarea>
                                @else    
                                    <input type="file" class="file file-{{$i}} opt-img-fl" id="opt_img-{{$i}}" name="single_choice_ans_img[]" data-id="{{$i}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control custom-control" disabled placeholder="Upload File" id="file-{{$i}}">
                                        <div class="input-group-append">
                                            <button type="button" class="browse butn-primary browse-{{$i}}" data-id="{{$i}}">Browse</button>
                                            <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                                        </div>
                                    </div>
                                    <div class="mt-2 que-img-section-{{$i}}" style="display: none;">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <label for="" class="form-label"><strong>Preview Image</strong></label>
                                        </div>
                                        <div class="preview-img-{{$i}}">
                                            <span class="pip">
                                                <img class="imageThumb-{{$i}}" title="" style='max-height: 250px;'>
                                                <button type="button" class="btn btn-danger custom-btn remove-que-img" title="Remove option image"><i class="fas fa-times"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    @error('single_choice_ans')
                                        <span class="error-text" role="alert">{{ $message }}</span>
                                    @enderror
                                    @error('single_choice_0')
                                        <span class="error-text" role="alert">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <label for="que_img" class="form-label"><input class="form-check-input ms-0" type="checkbox" id="flexCheckChecked" name="multi_choice_0[]" onclick="selectOption({{$i}})" value="{{ $opt_count->id + $i }}" data-id="0"> <strong>Option {{$i}}</strong></label>
                                    </div>
                                </div>
                                @if( $question->opt_img == 0 )
                                    {{-- <input type="text" id="single_choice_ans" class="form-control custom-control @error('single_choice_ans[]') danger-box @enderror" name="single_choice_ans[]"> --}}
                                    <textarea id="single_choice_ans" name="single_choice_ans[]" class="form-control custom-control single_choice_ans @error('question') danger-box @enderror" placeholder="Write answer..."></textarea>
                                @else
                                    <input type="file" class="file file-{{$i}} opt-img-fl" id="opt_img-{{$i}}" name="single_choice_ans_img[]" data-id="{{$i}}">
                                    <div class="input-group">
                                        <input type="text" class="form-control custom-control" disabled placeholder="Upload File" id="file-{{$i}}">
                                        <div class="input-group-append">
                                            <button type="button" class="browse butn-primary browse-{{$i}}" data-id="{{$i}}">Browse</button>
                                            <!-- <input class="form-control" type="file" id="formFileMultiple" multiple> -->
                                        </div>
                                    </div>
                                    <div class="mt-2 que-img-section-{{$i}}" style="display: none;">
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <label for="" class="form-label"><strong>Preview Image</strong></label>
                                        </div>
                                        <div class="preview-img-{{$i}}">
                                            <span class="pip">
                                                <img class="imageThumb-{{$i}}" title="" style='max-height: 250px;'>
                                                <button type="button" class="btn btn-danger custom-btn remove-que-img" title="Remove option image"><i class="fas fa-times"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    @error('que_img')
                                        <span class="error-text" role="alert">{{ $message }}</span>
                                    @enderror
                                @endif      
                            </div>
                        @endfor
                    @endif
                    
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
        tinymce.init({
            selector: 'textarea#question, textarea.single_choice_ans', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        });

        $(document).on("click", ".browse", function() {
            var file_id = $(this).data('id');
            var file = $(".browse-"+file_id).parents().find(".file-"+file_id);
            file.trigger("click");
        });

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
    $(".opt-img-fl").on("change", function(e) {
        var flId = $(this).data('id');
        var files = e.target.files, filesLength = files.length;
        var f = files[0]
        let extension = f.name.match(/(?<=\.)\w+$/g)[0].toLowerCase();
        $("#file-"+flId).val(f.name);
        if (extension === 'jpg' || extension === 'png') {
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
                var file = e.target;
                // $('.preview-img').append("<span class=\"pip\">" +
                //     "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/ style='max-height: 250px;'>" +
                //     "<br/><button type=\"button\" class=\"btn btn-danger custom-btn remove-que-img\" title=\"Remove image\"><i class=\"fas fa-times\"></i></button>" +
                //     "</span>");
                $('.imageThumb-'+flId).attr('src', e.target.result);
                $(".remove-que-img").click(function(){
                    $(this).parent(".pip").remove();
                    e.target.value = ''
                    $('#que_img').attr('value', '');
                    $('#file-'+flId).val('');
                    $('.que-img-section').hide();
                });
            });
            fileReader.readAsDataURL(f);
            $('.que-img-section-'+flId).show();
        }else{
            e.target.value = '';
            alert('Wrong file extension! Please upload only jpg, jpeg, png image.');
            $('.que-img-section').hide();
        }
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