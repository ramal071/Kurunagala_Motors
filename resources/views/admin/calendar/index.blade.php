@extends('admin/layouts.master')
@section('title', 'View Calendar')
@section('body')

  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
  <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary"> {{-- red line --}}
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.calendar') }}</h3>
                    <div class="container">
                        <div id="calendar"></div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('calandar')
<script>
$(document).ready(function () {
var servicerepair = @json($events);
// console.log(events)
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
    events: servicerepair
    });
});
  
</script>

@endsection