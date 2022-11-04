@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('topics.index') }}">Quize</a></li>
    <li><a href="{{ route('topics.index') }}">Topics</a></li>
    <li>Create Topic</li>
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
            <h3 class="card-title">Create Topic</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('topics.store') }}">
            @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="topic_subscription" class="form-label"><strong>Topic for</strong></label>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <select class="form-select custome-select @error('topic_subscription') danger @enderror" aria-label="Default select example" id="topic_subscription" name="topic_subscription">
                                    <option value="3">Basic</option>
                                    <option value="1">Master</option>
                                    <option value="2">Standard</option>
                                </select>
                            </div>
                        </div>
                        @error('topic_subscription')
                            {{-- <span id="name-error" class="error invalid-feedback">{{ $message }}</span> --}}
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="topic_name" class="form-label"><strong>Topic</strong></label>
                            </div>
                        </div>

                        <input type="text" id="topic_name" name="topic_name" class="form-control custom-control @error('topic_name') danger-box @enderror " placeholder="Enter topic" value="{{ old('topic_name') }}">
                        @error('topic_name')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="duration" class="form-label"><strong>Duration</strong></label>
                            </div>
                        </div>
                        <div class="number">
                            <span class="minus dur_minus large @error('duration') danger-number @enderror">-</span>
                            <input class="large" type="text" value="0" id="duration" name="duration"/>
                            <span class="plus dur_plus large @error('duration') danger-number @enderror">+</span>
                        </div>
                        @error('duration')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="duration_measure" class="form-label"><strong>Duration Measure</strong></label>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <select class="form-select custome-select @error('duration_measure') danger @enderror" aria-label="Default select example" id="duration_measure" name="duration_measure">
                                    <option value="minutes">Minutes</option> 
                                    <option value="hours">Hours</option> 
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="confirm-password" class="form-label"><strong>Passing grade (%)</strong></label>
                            </div>
                        </div>
                        {{-- <input type="number" class="form-control @error('passing_grade') is-invalid @enderror" id="passing_grade" step="0.1" name="passing_grade" placeholder="passing grade" value="{{ old('passing_grade') }}"> --}}
                        <div class="number">
                            <span class="minus pass_minus large @error('passing_grade') danger-number @enderror">-</span>
                            <input class="large" type="text" value="0" id="passing_grade" name="passing_grade"/>
                            <span class="plus pass_plus large @error('passing_grade') danger-number @enderror">+</span>
                        </div>
                        @error('passing_grade')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <label for="course_id" class="form-label"><strong>Topic for Course</strong></label>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <select class="form-select custome-select courses @error('course_id') danger-box @enderror" aria-label="Default select example" id="course_id" name="course_id">
                                </select>
                            </div>
                        </div>
                        @error('course_id')
                            <span class="error-text" role="alert">{{ $message }}</span>
                        @enderror
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
<script>
    $('.courses').select2({
        placeholder: "Choose course...",
        theme: 'bootstrap4',
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
            url: '{{ route("getCourses") }}',
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

        $container.find(".select2-result-repository__title").text(repo.course_name);

        return $container;
    }

    function formatRepoSelection (repo) {
        return repo.course_name || repo.text;
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
</script>
@endsection