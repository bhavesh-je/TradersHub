@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">LMS</li>
    <li class="breadcrumb-item active">Courses</li>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Courses</h3>
            <div class="card-tools">
                <a href="{{ route('courses.create') }}" class="btn btn-success btn-sm">Create Courses</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i> {{ session('success') }}
            </div>
            @endif

            <table id="courses_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course name</th>
                        <th class="text-center">Course categories</th>
                        <th class="text-center">Course for</th>
                        {{-- <th>Course video</th> --}}
                        <th class="text-center">Course price</th>
                        <th class="text-center">Course expire</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ( $courses as $key => $course )
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $course->course_name }}</td>
                        {{-- <td>@if(!empty($course->course_video_link))
                                {{ $course->course_video_link }}
                            @else
                                <label class="text-info">No video link</label>
                            @endif
                        </td> --}}
                        <td class="text-center">
                            @if( $course->cat_id != "null" )
                                @foreach( $categories as $key => $category )
                                    @if(in_array($category->id, json_decode($course->cat_id)))
                                        <span class=" badge bg-info">{{ $category->c_c_name }}</span>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            @if( !empty( $course->course_subscription ) )
                                @if( $course->course_subscription == 1)
                                    <span class=" badge rounded-pill bg-info">Master package</span>
                                @elseif( $course->course_subscription == 2 )
                                    <span class=" badge rounded-pill bg-danger">Standard package</span>
                                @else
                                    <span class=" badge rounded-pill bg-primary">Basic package</span>
                                @endif
                            @endif
                        </td>
                        <td class="text-center">
                            @if( $course->course_price && $course->course_sale_price )
                                <label class="">{{ $course->course_sale_price }}  <small> <del>{{ $course->course_price }}</del> </small></label>
                            @elseif( $course->course_price && empty( $course->course_sale_price ) )
                                <label class="">{{ $course->course_price }}</label>
                            @elseif( empty( $course->course_price ) && empty( $course->course_sale_price ) )
                                <label class="">Free</label>
                            @endif
                        </td>
                        <td class="text-center"> @if( $course->expiration && $course->course_expiration_day)
                                {{ date('d-m-Y', strtotime($course->created_at.' + '.$course->course_expiration_day.' days'))}}
                            @else
                                <label>No time limit</label>
                            @endif
                        </td>
                        <td colspan="2" class="text-center">
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                <a class="btn btn-sm btn-outline-info" href="{{ route('courses.show', $course->id) }}">Preview</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('courses.edit', $course->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php $i++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#courses_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection