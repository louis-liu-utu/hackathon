@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-lg-5">
       <div class="row">
                   <div class="col-md-8">
                       <div class="card card-chart">
                           <div class="card-header card-header-success">
                               <div class="ct-chart" id="dailySalesChart1"></div>
                           </div>
                           <div class="card-body">
                               <h4 class="card-title">Request Access Applications</h4>
                           </div>

                       </div>
                   </div>

               </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {

            dataDailySalesChart = {
                labels: {!! $labels !!},
                series: [
                    {!! $series !!}
                ]
            };

            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            }

            var dailySalesChart = new Chartist.Line('#dailySalesChart1', dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(dailySalesChart);

        });

    </script>
@endsection
