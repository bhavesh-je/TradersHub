@extends('layouts.main-app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ Route('meetings.index') }}">Meeting</a></li>
    <li class="breadcrumb-item active">Show Meeting</li>
@endsection

@section('css')
<style>
    /* .container {display: flex;flex-direction: row;height: calc(100vh - 16px);width: 100%;align-items: center;justify-content: center;max-width: 960px;margin: auto;} */
    #inviteCode.invite-page {box-sizing: border-box;display: flex;flex-direction: row;background-color: #fff;border: 1px solid #ccc;margin-bottom: 10px;border-radius: 5px;justify-content: space-between;width: 100%;box-shadow: 0px 1px 2px rgba(0,0,0,.07);}
    #link {align-self: center;font-size: 1.2em;color: #333;font-weight: bold;flex-grow: 2;background-color: #fff;border: none;}
    #copy {width: 30px;height: 30px;margin-left: 20px;margin: 5px;border: 1px solid black;border-radius: 5px;background-color: #f8f8f8;}
    i {display: block;line-height: 30px;position: relative;
    }&::before {display: block;width: 15px;margin: 0 auto;
    }&.copied::after {position: absolute;top: 0px;right: 35px;height: 30px;line-height: 25px;display: block;content: "copied";font-size: 1.5em;padding: 2px 10px;color: #fff;background-color: #4099FF;border-radius: 3px;opacity: 1;will-change: opacity, transform;animation: showcopied 1.5s ease;
    }&:hover {cursor: pointer;background-color: darken(#f8f8f8, 10%);transition: background-color .3s ease-in;}

    @keyframes showcopied {
        0% {opacity: 0;transform: translateX(100%);}
        70% {opacity: 1;transform: translateX(0);}
        100% {opacity: 0;}
    }
</style>
@endsection

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Show Meeting</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <strong>Topic:</strong>
                <label class="form-control">{{ $show_meeting->topic }}</label>
            </div>
            <div class="form-group">
                <strong>Join Url:</strong>
                <div id="inviteCode" class="invite-page text-center">
                    <input id="link" value="{{ $show_meeting->join_url }}" class="form-control" readonly>
                    <div id="copy">
                        <i class="fa fa-clipboard" aria-hidden="true" data-copytarget="#link"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <strong>Start Time:</strong>
                <label class="form-control">{{ $show_meeting->start_time }}</label>
            </div>
            <div class="form-group">
                <strong>Duration:</strong>
                <label class="form-control">{{ $show_meeting->duration }}</label>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#copy').on('click', function(event) {
        console.log(event);
        copyToClipboard(event);
    });

function copyToClipboard(e) {
  var
    t = e.target, 
    c = t.dataset.copytarget,
    inp = (c ? document.querySelector(c) : null);
  console.log(inp);
  if (inp && inp.select) {
    inp.select();
    try {
      document.execCommand('copy');
      inp.blur();

      t.classList.add('copied');
      setTimeout(function() {
        t.classList.remove('copied');
      }, 1500);
    } catch (err) {
      alert('please press Ctrl/Cmd+C to copy');
    }
  }
}
</script>
@endsection