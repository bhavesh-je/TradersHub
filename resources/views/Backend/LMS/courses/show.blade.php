@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('courses.index') }}">LMS</a></li>
    <li><a href="{{ route('courses.index') }}">Courses</a></li>
    <li>{{$course->course_name}}</li>
@endsection
@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card card-style3">
        @if( $course->course_video_link )
            <iframe class="card-img-top" width="100%" height="315" src="{{ $course->course_video_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Course for: </label>
                        @if( !empty( $course->course_subscription ) )
                        @if( $course->course_subscription == 1)
                            <p><span class="badge glow-info bg-info">Master package</span></p>
                        @elseif( $course->course_subscription == 2 )
                            <p><span class="badge glow-success bg-success">Standard package</span></p>
                        @else
                            <p><span class="badge glow-primary bg-primary">Basic package</span></p>
                        @endif
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Course name: </label>
                        <p>{{ $course->course_name }}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Course content: </label>
                        @if( $course->course_content )
                            {!! $course->course_content !!}
                        @else
                            <p> No content... </p>    
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Course price: </label>
                        @if( $course->course_price && $course->course_sale_price )
                            <p>$ {{ $course->course_sale_price }} <del>{{ $course->course_price }}</del></p>
                        @elseif( $course->course_price && empty( $course->course_sale_price ) )
                            <p>{{ $course->course_price }}</p>
                        @elseif( empty( $course->course_price ) && empty( $course->course_sale_price ) )   
                            <p>{{ 'Free' }}</p>    
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Course created: </label>
                        <p>{{ $course->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Course expire: </label>
                        <p>
                            @if( $course->expiration && $course->course_expiration_day)
                                {{ date('Y-m-d', strtotime($course->created_at.' + '.$course->course_expiration_day.' days'))}}
                            @else
                                {{ 'No limit' }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Course category: </label>
                        <p>
                            @if($course->cat_id)
                                {{ implode(', ', $course_cat) }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection