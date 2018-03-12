@extends('layouts.blank')

@section('htmlheader_title')
	Tablero de Reportes
@endsection

@section('main_container')
<div class="right_col" role="main">
  <div class="">
      <div id="grafico">
          
      </div>
  </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset("highchart/highcharts.js") }}"></script>
<script>
    $(function () { 
    var myChart = Highcharts.chart('grafico', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Grafico de Prueba'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Mary',
            data: [1, 0, 4]
        }, {
            name: 'LuisGa',
            data: [5, 7, 3]
        }]
    });
});
</script>
@endpush