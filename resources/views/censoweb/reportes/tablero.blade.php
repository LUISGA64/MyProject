@extends('layouts.blank')

@push('stylesheets')
{{-- Datatables --}}
@endpush

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
    

    var myChart = Highcharts.chart('grafico', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
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
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
</script>
@endpush