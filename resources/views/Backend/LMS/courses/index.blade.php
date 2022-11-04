@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('courses.index') }}">LMS</a></li>
    <li>Courses</li>
@endsection
@section('create-button')
<a href="{{ route('courses.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create Course</a>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="table-responsive">
    <table id="courses_table" class="table d-table" style="width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Course name</th>
                <th>Course categories</th>
                <th>Course for</th>
                <th>Course price</th>
                <th>Course expire</th>
                <th width="200px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ( $courses as $key => $course )
            <tr>
                <td class="table-id">{{ $i }}</td>
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
                                <span class="badge glow-info bg-info mt-3">{{ $category->c_c_name }}</span>
                            @endif
                        @endforeach
                    @endif
                </td>
                <td class="text-center">
                    @if( !empty( $course->course_subscription ) )
                        @if( $course->course_subscription == 1)
                            <span class="badge glow-info bg-info">Master package</span>
                        @elseif( $course->course_subscription == 2 )
                            <span class="badge glow-success bg-success">Standard package</span>
                        @else
                            <span class="badge glow-primary bg-primary">Basic package</span>
                        @endif
                    @endif
                </td>
                <td class="text-center">
                    @if( $course->course_price && $course->course_sale_price )
                        <label class="">${{ $course->course_sale_price }}  <small> <del>${{ $course->course_price }}</del> </small></label>
                    @elseif( $course->course_price && empty( $course->course_sale_price ) )
                        <label class="">${{ $course->course_price }}</label>
                    @elseif( empty( $course->course_price ) && empty( $course->course_sale_price ) )
                        <label class="">Free</label>
                    @endif
                </td>
                <td class=""> @if( $course->expiration && $course->course_expiration_day)
                        {{ date('d-m-Y', strtotime($course->created_at.' + '.$course->course_expiration_day.' days'))}}
                    @else
                        <label>No time limit</label>
                    @endif
                </td>
                <td class="">
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                        <a class="btn btn-info custom-btn btn-sm" href="{{ route('courses.show', $course->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-sm btn-primary custom-btn" href="{{ route('courses.edit', $course->id) }}"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger custom-btn show-alert-delete-box btn-sm" title='Delete'><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @php $i++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('admin-lte/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('#courses_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
              "paginate": {
                "previous": '<i class="fas fa-chevron-left"></i>',
                "next": '<i class="fas fa-chevron-right"></i>'
              }
            }
        });

        $('.show-alert-delete-box').on('click',function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
