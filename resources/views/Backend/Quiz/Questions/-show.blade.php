@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Quize</a></li>
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Questions</a></li>
    <li class="breadcrumb-item active">Show question</li>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/Backend/custom.css') }}">
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Topic :</label>
                <p> <span class="badge badge-info">{{ $question->topics->topic_name }}</span> </p>
            </div>
            <div class="form-group">
                <label>Question :</label>
                <p>{!! $question->question !!}</p>
                @if( $question->que_img )
                <img class="imageThumb" src="{{ asset('uploads/que-img/'.$question->que_img) }}" title="" style='max-height: 250px;'>
                @endif
            </div>
            
            <div class="form-group">
                <label>Options :</label>
            </div>
            
            <div class="row">
                @php $i = 1; @endphp
                @foreach ($question->options as $key => $option)
                <div class="col-md-6">
                    @if( $option->opt_img )
                        <p class="">{{$i}}.&nbsp;&nbsp;<img class="imageThumb" src="{{ asset('uploads/opt-img/'.$option->opt_img) }}" title="" style='max-height: 250px;'>
                            @foreach ($question->answer as $ans)
                                @if( $ans->opt_id == $option->id)
                                    <span class="badge badge-success"> True </span>
                                @endif
                            @endforeach
                        </p>
                    @else
                        <p class="">{{$i}}.&nbsp;&nbsp;{{ $option->option }}
                            @foreach ($question->answer as $ans)
                                @if( $ans->opt_id == $option->id)
                                    <span class="badge badge-success"> True </span>
                                @endif
                            @endforeach
                        </p>
                    @endif 
                    @php $i++; @endphp
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection



