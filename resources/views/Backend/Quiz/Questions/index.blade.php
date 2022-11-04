@extends('layouts.main-app')
@section('breadcrumb')
    <li><a href="{{ route('questions.index') }}">Quiz</a></li>
    <li>Questions</li>
@endsection
@section('create-button')
<a href="{{ route('questions.create') }}" class="btn btn-success btn-sm me-0 mb-2">Create Question</a>
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
    <table id="quizes-table" class="table d-table" style="width: 100%;">
        <thead>
            <tr>
                <th class="">#</th>
                <th width="350px">Question</th>
                <th width="300px">Topic</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 1 @endphp
        @foreach ( $questions as $key => $question )
        @php 
            $options = \App\Models\Option::where('que_id', $question->id)->where('topic_id', $question->topics->id)->count();
        @endphp
        <tr>
            <td class="table-id">{{ $i }}</td>
            <td>{!! $question->question !!}</td>
            <td>
                @if($question->topics)
                    <span class="badge glow-info bg-info mt-3">{{ $question->topics->topic_name }}</span>
                @endif
            </td>
            <td>
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                    <a class="btn btn-dark custom-btn btn-sm" href="{{ route('questions.show',$question->id) }}"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary custom-btn btn-sm" href="{{ route('questions.edit', $question->id) }}"><i class="fas fa-edit"></i></a>
                    @if( $options > 0 )
                        <a class="btn btn-secondary custom-btn btn-sm" href="{{ route('option.edit', $question->id) }}"><i class="fas fa-plus"></i></a>
                    @else
                        <a class="btn btn-info custom-btn btn-sm" href="{{ route('option.create', ['que_id'=>$question->id]) }}"><i class="fas fa-file-alt"></i></a>
                    @endif
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
    $('#quizes-table').DataTable({
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