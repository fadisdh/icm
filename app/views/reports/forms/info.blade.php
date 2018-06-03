<!-- Responsive calendar - START -->

<div class="responsive-calendar">

  <div class="controls">

      <a class="pull-left" data-go="prev"><div class="btn btn-default"><i class="fa fa-chevron-left"></i></div></a>

      <h4><span data-head-year></span> <span data-head-month></span></h4>

      <a class="pull-right" data-go="next"><div class="btn btn-default"><i class="fa fa-chevron-right"></i></div></a>

  </div><hr/>

  <div class="day-headers">

    <div class="day header">Sun</div>

    <div class="day header">Mon</div>

    <div class="day header">Tue</div>

    <div class="day header">Wed</div>

    <div class="day header">Thu</div>

    <div class="day header">Fri</div>

    <div class="day header">Sat</div>

  </div>

  <div class="days" data-group="days">

    

  </div>

</div>

<!-- Responsive calendar - END -->



<script type="text/javascript">

  function addLeadingZero(num) {

    if (num < 10) {

      return "0" + num;

    } else {

      return "" + num;

    }

  }

  $(function(){

    var $date = $('#report-date');

    var $calendar = $(".responsive-calendar");



    var events = {};

    var day = '{{ $report->date }}';

    @if($report->id)

      events['{{ $report->date }}'] = {"Class" : "calendar-selected"};

    @endif



    $calendar.responsiveCalendar({

      time: day ? day.substr(0, 7): undefined,

      startFromSunday: true,

      events: events,

      onDayClick: function(){

        var $this = $(this);

        var date = $this.data('year') + '-' + addLeadingZero($this.data('month')) + '-' + addLeadingZero($this.data('day'));

        $date.val(date);



        $calendar.responsiveCalendar('clearAll');

        var events = {};

        events[date] = {"Class" : "calendar-selected"};

        $calendar.responsiveCalendar('edit', events);

      }

    });

  });

</script>



{{ Form::model($report, array('route' => array('project.report.save.post', $report->id ? $report->id : 0, $report->project_id), 'class' => 'form-horizontal', 'role' => 'form')) }}

  <div class="input-group">

    {{ Form::text('date', $report->date, array('id' => 'report-date', 'class' => 'form-control')) }}

    <span class="input-group-btn">

      <button type="submit" class="btn btn-primary" type="button"><i class="fa fa-check"></i> Save</button>

    </span>

  </div><!-- /input-group -->

  {{ Form::token() }} 

{{ Form::close() }}