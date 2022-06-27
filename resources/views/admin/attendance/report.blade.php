@extends('admin/layouts.master')
@section('title', 'View Attendance Chart')
@section('body')



{{-- {{ dd( $months ) }}
{{ dd( $monthCount )}} --}}

{{-- <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
            <h1 class="mt-4">Dashboard</h1> 
            <div class="box-body">
                <div class="row">

                    <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i>
                   
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Area Chart Example
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</section>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script type="text/javascript">
                var _ydata=JSON.parse('{!! json_encode($months) !!}');
                var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');
            </script>
            <script src="{{asset('public')}}/assets/demo/chart-area-demo.js"></script>
            <script src="{{asset('public')}}/assets/demo/chart-bar-demo.js"></script>   --}}


{{-- @endsection --}}




{{--  canvas js line chart--}}

<?php
//  echo $current_month = date('M Y', strtotime("-0 month"));
// echo"<pre>"; print_r($usersCount); die;

    $months = array();
    $count = 0;
    while ($count <= 3) {
        $months[] = date('M Y', strtotime("-".$count." month"));
    $count++;
    }
   // echo"<pre>"; print_r($months); die;    

$dataPoints = array(
	array("y" => $usersCount[3], "label" => $months[3]),
    array("y" => $usersCount[2], "label" => $months[2]),
    array("y" => $usersCount[1], "label" => $months[1]),
    array("y" => $usersCount[0], "label" => $months[0]),
	
);
 
?>



<script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Attendance"
        },
        axisY: {
            title: "Number of Users"
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
     
    }
    </script>





     <div id="chartContainer" style="height: 370px; width: 75%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



</body>
</html>


@endsection
