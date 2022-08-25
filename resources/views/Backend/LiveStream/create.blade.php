@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ Route('meetings.index') }}">Meeting</a></li>
    <li class="breadcrumb-item active">Create Meeting</li>
@endsection

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Meeting</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('meetings.store') }}">
                @csrf
                <div class="form-group">
                    <label for="" class="">Topic of Meeting</label>
                    <input type="text" class="form-control @error('topic') is-invalid @enderror" placeholder="Enter Topic" name="topic" value="{{ old('topic') }}">
                    @error('topic')
                        <span id="topic-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dtpickerdemo" class="control-label">Date/time of schedule</label>
                    <div class="row d-flex">
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="task_date" id="date" value="{{ old('task_date') }}" />
                            @error('date')
                                <span id="date-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control @error('time') is-invalid @enderror" name="task_time" id="time" value="{{ old('task_time') }}"/>
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
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" placeholder="Enter Minutes" name="duration" value="{{ old('duration') }}">
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
@endsection