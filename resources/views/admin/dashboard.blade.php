@extends('layouts.admin')

@section('content')
    <div class="content">
     <div class="container-fluid mt-lg-5">
       <div class="row">
                   <div class="col-md-12">
                       <div class="card card-chart">
                           <div class="card-header card-header-warning">
                               <div class="ct-chart" id="completedTasksChart1"></div>
                           </div>
                           <div class="card-body">
                               <h4 class="card-title">Google Analytics ( <span class="card-category">Red Line: visitors</span>; <span class="card-category">White Line: pageViews</span>)</h4>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-12">
                       <div class="card card-chart">
                           <div class="card-header card-header-success">
                               <div class="ct-chart" id="dailySalesChart1"></div>
                           </div>
                           <div class="card-body">
                               <h4 class="card-title">Request Access Applications</h4>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-12">
                       <div class="card card-chart">
                           <div class="card-header card-header-primary">
                               <div class="ct-chart" id="dailySalesChart2"></div>
                           </div>
                           <div class="card-body">
                               <h4 class="card-title">App Downloads</h4>
                           </div>
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
                    tension: 1
                }),
                low: {{$serieSmallest}},
                high: {{$serieBiggest}}, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                stretch: true
            }

            var dailySalesChart = new Chartist.Line('#dailySalesChart1', dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(dailySalesChart);


            dataCompletedTasksChart = {
                labels: {!! $analyticsLabels !!},
                series: {!! $analyticsSeries !!},
            };

            optionsCompletedTasksChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: {{$analyticsSerieSmallest}},
                high: {{$analyticsSerieBiggest}}, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            }

            var completedTasksChart = new Chartist.Line('#completedTasksChart1', dataCompletedTasksChart, optionsCompletedTasksChart);
            md.startAnimationForLineChart(completedTasksChart);


            dataDailySalesChart = {
                labels: {!! $downloadLabels !!},
                series: [
                    {!! $downloadSeries !!}
                ]
            };

            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: {{$downloadSerieSmallest}},
                high: {{$downloadSerieBiggest}}, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            }

            var dailySalesChart = new Chartist.Line('#dailySalesChart2', dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(dailySalesChart);

        });

    </script>
@endsection
