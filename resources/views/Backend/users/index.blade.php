@extends('layouts.main-app')
@section('breadcrumb')
    <li class="">Users</li>
@endsection
@section('create-button')
<a href="{{ route('users.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create User</a>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')    
<div class="table-responsive">
  @if(session('success'))
      <div class="custom-alert">
        <div class="alert alert-success alert-dismissible " role="alert">
          <strong><i class="far fa-star me-2"></i>Success!</strong> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times success me-2"></i></button>
        </div>
      </div>
    @endif
    <table id="users-table" class="table d-table" style="width: 100%;">
      <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-center">Roles</th>
            <th width="280px" class="text-center">Action</th>
          </tr>
      </thead>
      <tbody>
        @php $i = 1 @endphp
        @foreach ($data as $key => $user)
            <tr>
                <td class="table-id">{{ $i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge glow-success bg-success mt-3">{{ $v }}</label>
                    @endforeach
                @endif
                </td>
                <td class="text-center">
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <a class="btn btn-info custom-btn btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary custom-btn btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit"></i></a>
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
        $('#users-table').DataTable({
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
