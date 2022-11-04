@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('questions.index') }}">Quize</a></li>
    <li><a href="{{ route('questions.index') }}">Questions</a></li>
    <li>Show question</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-style4">
            <div class="card-body">
                <div class="form-group">
                    <label for="" class="form-label"><strong>Topic :</strong></label>
                    <span class="badge glow-success bg-success">{{ $question->topics->topic_name }}</span>
                </div>
                <div class="form-group">
                    <label for="" class="form-label"><strong>Question :</strong></label>
                    {!! $question->question !!}
                </div>
                <div class="form-group">
                    <label for="" class="form-label"><strong>Options :</strong></label>
                    <div class="row">
                        @php $i = 1; @endphp
                        @foreach ($question->options as $key => $option)
                            <div class="col-md-6">
                                <label for="" class="form-label">Options {{$i}} :  @foreach ($question->answer as $ans) @if( $ans->opt_id == $option->id)<span class="badge glow-success bg-success">True</span>@endif @endforeach</label>
                                @if( $option->opt_img )
                                    <img class="imageThumb" src="{{ asset('uploads/opt-img/'.$option->opt_img) }}" title="" style='max-height: 250px;'>
                                @else
                                    {!! $option->option !!}
                                @endif
                            </div>
                        @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection