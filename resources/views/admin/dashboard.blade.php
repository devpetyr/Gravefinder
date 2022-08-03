@extends('admin.layouts.main')
@section('content')


<div class="row justify-content-md-center">
    <div class="col-12 mb-4">
       
            <div class="card chart-container">
  <canvas id="chart2"></canvas>
</div>
        
    </div>
    
  
    
</div>
@endsection
@section('js')
<script>
      const ctx2 = document.getElementById("chart2").getContext('2d');
      const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ["January", "February", "March", "April",
          "May", "June", "July","August","September","October","November","December"],
          datasets: [{
            label: 'Orders',
            backgroundColor: 'rgba(161, 198, 247, 1)',
            borderColor: 'rgb(47, 128, 237)',
            data: [{{$month1}}, {{$month2}}, {{$month3}}, {{$month4}}, {{$month5}}, {{$month6}}, {{$month7}},{{$month8}},{{$month9}},{{$month10}},{{$month11}},{{$month12}}],
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
</script>
@endsection

@section('css')

@endsection




