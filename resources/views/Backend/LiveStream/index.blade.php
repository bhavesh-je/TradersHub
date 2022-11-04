@extends('layouts.main-app')
@section('breadcrumb')
    <li>Meetings</li>
@endsection

@section('create-button')
<a href="{{ Route('meetings.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create Meeting</a>
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
    <table id="meetings-table" class="table d-table" style="width: 100%;">
        <thead>
            <tr>
                <th width="20">#</th>
                <th>Topic</th>
                {{-- <th width="150">Join Url</th> --}}
                <th>Start Time</th>
                <th width="50">Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 1 @endphp
        @foreach ($listmeeings as $list)
            <tr>
                <td class="table-id">{{ $i }}</td>
                <td>{{$list->topic}}</td>
                {{-- <td class="join_url" >{{$list->join_url}}</td> --}}
                <td>
                    @php
                        $dt = new DateTime($list->start_time);
                        $tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

                        $dt->setTimezone($tz);
                        echo $dt->format('Y-m-d H:i');
                    @endphp
                </td>
                <td class="text-center" >{{$list->duration}}m</td>
                <td class="text-center">
                    {{-- <a href="{{ route('meetings.destroy',$list->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                    <form method="post" action="{{ route('meetings.destroy',$list->id) }}">
                        <button type="button" class="btn btn-primary custom-btn join-url-popup btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Join Url" data-html="true" data-content='<ul class="nav"><li><a href="#">hola</li><li><a href="#">hola2</li></ul>'><i class="fas fa-clipboard"></i></button>    
                        <a href="{{ route('meetings.show',$list->id) }}" class="btn btn-dark custom-btn btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('meetings.edit',$list->id) }}" class="btn btn-primary custom-btn btn-sm"><i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <a type="submit" class="btn btn-danger custom-btn show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></a>
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
    
    
    $('#meetings-table').DataTable({
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

    
    setTimeout((function() {

        $(document).on("click", ".popover .close" , function(){
            $(this).parents(".popover").popover('hide');
        });

        $('.join-url-popup').popover({
            placement : 'top',
        });
    }), 200);
    
</script>
@endsection