@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ Route('meetings.index') }}">Meeting</a></li>
    <li class="breadcrumb-item active">Edit Meeting</li>
@endsection

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Meeting</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ Route('meetings.update',$edit_meeting->id ) }}" >
                @csrf
                @method('PUT')
                <input type="hidden" name="m_id" value="{{ $edit_meeting->m_id }}">
                <input type="hidden" name="uuid" value="{{ $edit_meeting->uuid }}">
                <input type="hidden" name="join_url" value="{{ $edit_meeting->join_url }}">
                <input type="hidden" name="host_id" value="{{ $edit_meeting->host_id }}">
                <input type="hidden" name="type" value="{{ $edit_meeting->type }}">
                <div class="form-group">
                    <label for="" class="">Topic of Meeting</label>
                    <input type="text" class="form-control @error('topic') is-invalid @enderror" value="{{ $edit_meeting->topic }}" placeholder="Enter Topic" name="topic">
                    @error('topic')
                        <span id="topic-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dtpickerdemo" class="control-label">Date/time of schedule</label>
                    <div class="col-md-12 d-flex" id="dateTime">
                        <input type="hidden" name="mydatetime" value="{{ $edit_meeting->start_time }}" id="mydatetime">
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="task_date" id="date" value=""/>
                            @error('date')
                                <span id="date-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control @error('time') is-invalid @enderror" name="task_time" id="time" value=""/>
                            @error('time')
                                <span id="time-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="start_time" id="start_time">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="" class="col-md-12 ">Duration</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" value="{{ $edit_meeting->duration }}" placeholder="Enter Minutes" name="duration">
                        @error('duration')
                            <span id="duration-error" class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" onclick="onDateSubmit()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
var calc = document.getElementById("calc");
var onDateSubmit = function (){
    var date = document.getElementById("date").value;
    var time = document.getElementById("time").value;
    console.log("Time is"+time+"an Date is"+date);
    var convertedDateTime = new Date(date + " " + time);
    // var convertedDateTime = new Date(date + " " + time).toISOString();
    var formattedTime = ISODateString(convertedDateTime);
    console.log(formattedTime);
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
</script>
<script>
$(document).ready(function(){

    $('#dateTime').click(function(){
        var date = document.getElementById("date").value;
        var time = document.getElementById("time").value;
        console.log("Time is "+time+" an Date is "+date);
    });

    var datetime = $('#mydatetime').val();
    console.log(datetime);
    var mydate = new Date(datetime);
    console.log("R "+mydate);
    // var dateString = mydate.toISOString().substring(0, 10);
    // var timeString = mydate.toISoString().substring(11, 16);
    var dateString = mydate.toLocaleString().substring(0, 10);
    var timeString = mydate.toLocaleString().substring(12, 17);
    // var timeString = date.setHours(0,0);
    var newDate = formatDate(mydate);
    console.log("Date is "+newDate+" an Time is "+timeString);

    $('#date').val(newDate);
    $('#time').val(timeString);
    function NewISODateString(d) {
        function pad(n) {return n<10 ? '0'+n : n}
        return d.getUTCFullYear()+'-'
            + pad(d.getUTCMonth()+1)+'-'
            + pad(d.getUTCDate())+'T'
            + pad(d.getUTCHours())+':'
            + pad(d.getUTCMinutes())+':'
            + pad(d.getUTCSeconds())+'Z'
    }
    function formatDate(date) {
        var d = new Date(date);
            month = '' + (d.getMonth() + 1);
            day = '' + d.getDate();
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }
});
</script>
@endsection