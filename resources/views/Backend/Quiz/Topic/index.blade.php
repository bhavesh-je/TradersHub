@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Quiz</li>
    <li class="breadcrumb-item active">Topics</li>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Topics</h3>
            <div class="card-tools">
                <a href="{{ route('topics.create') }}" class="btn btn-success btn-sm">Create Topic</a>
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

            <table id="courses_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic</th>
                        <th class="text-center">Topic for</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($topics as $topic)
                        <tr>
                            <td> {{ $i }} </td>
                            <td> {{ $topic->topic_name }} </td>
                            <td class="text-center"> 
                                @if( !empty( $topic->topic_subscription ) )
                                    @if( $topic->topic_subscription == 1)
                                        <span class=" badge rounded-pill bg-info">Master package</span>
                                    @elseif( $topic->topic_subscription == 2 )
                                        <span class=" badge rounded-pill bg-danger">Standard package</span>
                                    @else
                                        <span class=" badge rounded-pill bg-primary">Basic package</span>
                                    @endif
                                @endif
                            </td>
                            <td colspan="2" class="text-center">
                                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('topics.edit', $topic->id) }}">Edit</a>
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
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#courses_table').DataTable({
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