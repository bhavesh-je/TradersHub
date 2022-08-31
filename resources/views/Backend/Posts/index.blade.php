@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Posts</li>
    <li class="breadcrumb-item active">List</li>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Posts List</h3>
            <div class="card-tools">
                <a href="{{ Route('posts.create') }}" class="btn btn-success pul-right">Create Post</a>
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
            <table id="post-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post Title</th>
                        <th>Post Status</th>
                        <th width="200" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($listPostData as $key => $post)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $post->post_title }}</td>
                            <td class="text-center">
                                @if ($post->post_status == 1)
                                    <span class="badge rounded-pill bg-primary">Published</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">Unpublished</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{ route('posts.show',$post->id) }}" class="btn btn-outline-primary btn-sm">Show</a> --}}
                                <form method="post" action="{{ route('posts.destroy',$post->id) }}">
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
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
        $('#post-table').DataTable({
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