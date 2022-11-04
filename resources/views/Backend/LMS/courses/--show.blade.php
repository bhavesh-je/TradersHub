@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">LMS</li>
    <li class="breadcrumb-item active">Courses</li>
    <li class="breadcrumb-item active">{{$course->course_name}}</li>
@endsection
@section('content')
<div class="col-12">
    <div class="card">
        @if( $course->course_video_link )
            <iframe width="100%" height="315" src="{{ $course->course_video_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><strong>Course name: </strong></h5>
                    <p>{{ $course->course_name }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Course for: </strong></h5>
                    @if( !empty( $course->course_subscription ) )
                        @if( $course->course_subscription == 1)
                            <p><span class=" badge rounded-pill bg-info">Master</span></p>
                        @elseif( $course->course_subscription == 2 )
                            <p><span class=" badge rounded-pill bg-danger">Standard</span></p>
                        @else
                            <p><span class=" badge rounded-pill bg-primary">Basic</span></p>
                        @endif
                    @endif
                </div>
                <div class="col-md-12">
                    <h5><strong>Course content: </strong></h5>
                    @if( $course->course_content )
                        <p>{!! $course->course_content !!}</p>
                    @else
                        <p> No content... </p>    
                    @endif    
                </div>
                <div class="col-md-3">
                    <h5><strong>Course price: </strong></h5>
                    @if( $course->course_price && $course->course_sale_price )
                        <p>$ {{ $course->course_sale_price }} <del>{{ $course->course_price }}</del></p>
                    @elseif( $course->course_price && empty( $course->course_sale_price ) )
                        <p>{{ $course->course_price }}</p>
                    @elseif( empty( $course->course_price ) && empty( $course->course_sale_price ) )   
                        <p>{{ 'Free' }}</p>    
                    @endif    
                </div>
                <div class="col-md-3">
                    <h5><strong>Course created: </strong></h5>
                    <p>{{ $course->created_at->diffForHumans() }}</p>
                </div>
                <div class="col-md-3">
                    <h5><strong>Course expire: </strong></h5>
                    <p>
                        @if( $course->expiration && $course->course_expiration_day)
                            {{ date('Y-m-d', strtotime($course->created_at.' + '.$course->course_expiration_day.' days'))}}
                        @else
                            {{ 'No limit' }}
                        @endif
                    </p>
                </div>
                <div class="col-md-3">
                    <h5><strong>Course category: </strong></h5>
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
@endsection