@extends('layouts.main-app')
@section('breadcrumb')
    <li>FAQs</li>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('create-button')
<a href="{{ route('faq.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create FAQ</a>
@endsection

@section('content')    
<div class="table-responsive">
    <table id="faq-table" class="table d-table" style="width: 100%;">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th width="250">Question</th>
                <th width="450">Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
            @foreach ($items as $item)
            <tr>
                <td class="text-center"> {{ $i }} </td>
                <td> {{ $item->question }} </td>
                <td>{!! substr(strip_tags($item->answer), 0, 80) . '...' !!}</td>
                <td>
                    <form action="{{ route('faq.destroy', $item->id) }}" method="POST">
                        <a class="btn btn-info custom-btn btn-sm" href="{{ route('faq.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
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
        $('#faq-table').DataTable({
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
