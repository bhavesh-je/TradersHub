@extends('layouts.main-app')
@section('breadcrumb')
    <li>Video posts</li>
@endsection
@section('create-button')
<a href="{{ route('video-post.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create Video Post</a>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="table-responsive">
    @if(session('success'))
        <div class="custom-alert">
          <div class="alert alert-success alert-dismissible " role="alert">
            <strong><i class="fas fa-check me-2"></i>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times success me-2"></i></button>
          </div>
        </div>
      @endif
      <table id="video-posts-table" class="table d-table" style="width: 100%;">
          <thead>
              <tr>
                  <th class="">#</th>
                  <th>Post name</th>
                  <th>Video link</th>
                  <th width="200px">Action</th>
              </tr>
          </thead>
          <tbody>
          @php $i = 1 @endphp
          @foreach ( $allVideoPosts as $key => $allVideoPost )
          <tr>
            <td class="table-id">{{ $i }}</td>
            <td>{{ $allVideoPost->post_title }}</td>
            <td>
                @if( $allVideoPost->youtube_video_link )
                    <iframe width="50%" height="100" src="{{ $allVideoPost->youtube_video_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                @else
                    <video width="50%" height="100" controls>
                        <source src="{{ asset($allVideoPost->post_video_name) }}" type="video/mp4">
                    </video>
                @endif
            </td>
            <td>
              <form action="{{ route('video-post.destroy', $allVideoPost->id) }}" method="POST">
                <a class="btn btn-info custom-btn btn-sm" href="{{ route('video-post.edit', $allVideoPost->id) }}"><i class="fas fa-edit"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger custom-btn show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
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
        $('#video-posts-table').DataTable({
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
    </script>
@endsection