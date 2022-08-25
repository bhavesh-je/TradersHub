@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item active">Meetings List</li>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
{{-- <style>
    .btn-sm{
        padding: 0.25rem 1.5rem !important;
    }
</style> --}}
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Meetings List</h3>
            <div class="card-tools">
                <a href="{{ Route('meetings.create') }}" class="btn btn-success pul-right">Create Meeting</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="button" id="zoom_meeting_link" class="btn btn-outline-info btn-md"><i class="nav-icon fas fa-video"></i> Click to Get Zoom Link</button>
            </div> --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
            @endif
            <table id="metting-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic</th>
                        <th width="200">Join Url</th>
                        <th>Start Time</th>
                        <th>Duration</th>
                        <th width="200" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    @foreach ($listmeeings as $list)
                    {{-- @php echo '<pre>'; print_r( $list ); echo '</pre>'; @endphp --}}
                        <tr>
                            <td>{{$a}}</td>
                            <td>{{$list->topic}}</td>
                            <td class="join_url" >{{$list->join_url}}</td>
                            <td class="text-center">
                                @php
                                    $dt = new DateTime($list->start_time);
                                    $tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

                                    $dt->setTimezone($tz);
                                    echo $dt->format('Y-m-d H:i');
                                @endphp
                                {{-- {{$list->start_time}} --}}
                                {{-- {!! date('Y-m-d H:i', strtotime($list->start_time)) !!} --}}
                                {{-- <span id="date"></span><br/>
                                <span id="time"></span>
                                <input type="hidden" name="mydatetime" value="{{ $list->start_time }}" class="mydatetime" > --}}
                            </td>
                            <td class="text-center" >{{$list->duration}}m</td>
                            <td class="text-center d-flex justify-content-around">
                                <a href="{{ route('meetings.show',$list->id) }}" class="btn btn-outline-primary btn-sm">Show</a>
                                <a href="{{ route('meetings.edit',$list->id) }}" class="btn btn-outline-info btn-sm">Edit</a>
                                {{-- <a href="{{ route('meetings.destroy',$list->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                <form method="post" action="{{ route('meetings.destroy',$list->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a type="submit" class="btn btn-outline-danger show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</a>
                                </form>
                            </td>
                        </tr>
                        <?php $a +=1; ?>
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
<script>
    $(function () {
        $('#metting-table').DataTable({
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
const copyMailId = document.querySelectorAll('.join_url');

copyMailId.forEach(copyText => {
    copyText.addEventListener('click', () => {
        const selection = window.getSelection();
        const range = document.createRange();
        range.selectNodeContents(copyText);
        selection.removeAllRanges();
        selection.addRange(range);

        try {
            document.execCommand('copy');
            selection.removeAllRanges();

            const mailId = copyText.textContent;
            copyText.textContent = 'Copied!';
            copyText.classList.add('success');

            setTimeout(() => {
                copyText.textContent = mailId;
                copyText.classList.remove('success');
            }, 1000);
        } catch (e) {
            copyText.textContent = 'Couldn\'t copy, hit Ctrl+C!';
            copyText.classList.add('error');

            setTimeout(() => {
                errorMsg.classList.remove('show');
            }, 1200);
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    var calc = document.getElementById("calc");
    var onDateSubmit = function (){
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;
        console.log("Time is"+time+"an Date is"+date);
        var convertedDateTime = new Date(date + " " + time);
        // var convertedDateTime = new Date(date + " " + time).toISOString();
        var formattedTime = ISODateString(convertedDateTime);
        $('#start_time').val(formattedTime);
    };
    function ISODateString(d) {
        function pad(n) {return n<10 ? '0'+n : n}
        return d.getUTCFullYear()+'-'
             + pad(d.getUTCMonth()+1)+'-'
             + pad(d.getUTCDate())+'T'
             + pad(d.getUTCHours())+':'
             + pad(d.getUTCMinutes())+':'
             + pad(d.getUTCSeconds())+'Z'
    }
    var datetime = $('.mydatetime').val();
    // console.log(datetime);
    var mydate = new Date(datetime);
    // var dateString = mydate.toISOString().substring(0, 10);
    // var timeString = mydate.toISOString().substring(11, 16);
    var dateString = mydate.toLocaleString().substring(0, 10);
    var timeString = mydate.toLocaleString().substring(12, 17);
    // var timeString = date.setHours(0,0);
    // $('#date').val(dateString);
    // $('#time').val(timeString);
    $('#date').text(dateString);
    $('#time').text(timeString);
});
</script> 
@endsection