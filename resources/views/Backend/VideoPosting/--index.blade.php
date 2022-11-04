@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Video posts</li>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Video posts</h3>
            <div class="card-tools">
                <a href="{{ route('video-post.create') }}" class="btn btn-success btn-sm">Create Video Post</a>
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
            <table id="video-posts-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                         <th>Post name</th>
                         <th width="30%" class="text-center">Video link</th>
                         <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ( $allVideoPosts as $key => $allVideoPost )
                    <tr>
                        <td>{{ $i }}</td>
                        {{-- <td>{{ $allVideoPost->post_name }}</td> --}}
                        <td>{{ $allVideoPost->post_title }}</td>
                        <td class="text-center"> 
                            @if( $allVideoPost->youtube_video_link )
                                <iframe width="50%" height="100" src="{{ $allVideoPost->youtube_video_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                            @else
                                <video width="50%" height="100" controls>
                                    <source src="{{ asset($allVideoPost->post_video_name) }}" type="video/mp4">
                                </video>
                            @endif
                        </td>
                        <td class="text-center">
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('video-post.edit',$allVideoPost->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['video-post.destroy', $allVideoPost->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger show-alert-delete-box btn-sm','data-toggle'=>"tooltip","title"=>"Delete"]) !!}
                            {!! Form::close() !!}
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
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">
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
<script>
    $(function () {
        $('#video-posts-table').DataTable({
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