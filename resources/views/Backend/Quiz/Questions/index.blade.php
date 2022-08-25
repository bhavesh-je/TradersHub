@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Quiz</li>
    <li class="breadcrumb-item active">Questions</li>
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
            <h3 class="card-title">Questions</h3>
            <div class="card-tools">
                <a href="{{ route('questions.create') }}" class="btn btn-success btn-sm">Create Question</a>
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

            <table id="questions_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Question</th>
                        <th class="text-center">Topic</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ( $questions as $key => $question )
                    @php 
                        $options = \App\Models\Option::where('que_id', $question->id)->where('topic_id', $question->topics->id)->count();
                    @endphp
                    {{-- @dd($options); --}}
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>{{ $question->question }}</td>
                        <td class="text-center">@if($question->topics)<span class="badge badge-info">{{ $question->topics->topic_name }}</span>@endif</td>
                        <td class="text-center">
                            <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('questions.show', $question->id) }}">Preview</a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('questions.edit', $question->id) }}">Edit</a>
                                @if( $options > 0 )
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('option.edit', $question->id) }}">Edit Options</a>
                                @else
                                    <a class="btn btn-sm btn-outline-dark" href="{{ route('option.create', ['que_id'=>$question->id]) }}">Add Options</a>
                                @endif    
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
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#questions_table').DataTable({
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