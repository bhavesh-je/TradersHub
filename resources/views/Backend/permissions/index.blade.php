@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('permissions.index') }}">Role Management</a></li>
    <li>Permissions</li>
@endsection
@section('create-button')
<a href="{{ route('permissions.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create Permission</a>
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
    <table id="role-table" class="table d-table" style="width: 100%;">
      <thead>
          <tr>
              <th class="">#</th>
              <th>Name</th>
              <th width="200px">Action</th>
          </tr>
      </thead>
      <tbody>
      @php $i = 1 @endphp
      @foreach ($permissions as $key => $permission )
        <tr>
          <td class="table-id">{{ $i }}</td>
          <td> {{ $permission->name }} </td>
          <td>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
              <a class="btn btn-info custom-btn btn-sm" href="{{ route('permissions.edit', $permission->id) }}"><i class="fas fa-edit"></i></a>
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
        $('#role-table').DataTable({
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
