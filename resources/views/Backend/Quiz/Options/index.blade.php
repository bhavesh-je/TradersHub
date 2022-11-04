@extends('layouts.main-app')
@section('breadcrumb')
    <li>Quiz</li>
    <li>Options</li>
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
            <h3 class="card-title">Options</h3>
            <div class="card-tools">
                <a href="{{ route('option.create') }}" class="btn btn-success btn-sm">Create Option</a>
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

            <table id="option_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Option</th>
                        <th>Question</th>
                        <th class="text-center">Is True</th>
                        <th class="text-center" >Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach( $options as $option )
                        <tr>
                            <td> {{ $i }} </td>
                            <td> {{ $option->option }} </td>
                            <td>
                                @foreach( $option->questions as $que )
                                    {{ $que->question }}
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if( count($option->answers) > 0 )
                                    @foreach( $option->answers as $ans )
                                        <label class="badge badge-success">True</label>
                                    @endforeach
                                @else
                                    <label class="badge badge-danger">False</label>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('option.edit',$option->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['option.destroy', $option->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
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
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#option_table').DataTable({
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