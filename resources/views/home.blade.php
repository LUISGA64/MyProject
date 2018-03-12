@extends('layouts.blank')

@section('htmlheader_title')
  Inicio
@endsection


@section('main_container')


<!-- page content -->
<div class="right_col" role="main">
	<div class="row" style="margin-top: 60px;">
		<div class="panel panel-default">
			<div class="panel-body">
				{!! Charts::styles() !!}
			</head>
			<body>
				<!-- Main Application (Can be VueJS or other JS framework) -->
				<div class="app">
					<center>
						{!! $chart->html() !!}
					</center>
				</div>
				<!-- End Of Main Application -->
				{!! Charts::scripts() !!}
				{!! $chart->script() !!}
			</body>
			</div>
		</div>
	</div>
	
</div>

@endsection


