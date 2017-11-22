@extends('layouts.blank')

@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush



@section('main_container')

<!-- page content -->
<div class="right_col" role="main">
	
	<div class="">
		{{-- <script type="text/javascript" src="{{ asset('/censoweb/act_econ.js') }}"></script> --}}
		<h1 style="text-align: center; color: #3EB2AB">Listado Censal</h1>
		{{-- <img style="display: block; margin: auto;" src="/img/DocResaguardo/{{ $resg->logo_resg }}" /> --}}



	</div>
</div>






<footer>
	<div class="pull-right">
		<h3><strong>Censo Web</strong></h3>
	</div>
	<div class="clearfix"></div>
</footer>
<!-- /footer content -->
@endsection
