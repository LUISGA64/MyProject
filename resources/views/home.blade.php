@extends('layouts.blank')

@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush



@section('main_container')

<!-- page content -->
<div class="right_col" role="main">
	
    <div class="">
	<script type="text/javascript" src="{{ asset('/censoweb/act_econ.js') }}"></script>
	
    </div>

</div>
<!-- /page content -->

<!-- footer content -->

<footer>
    <div class="pull-right">
        <h3><strong>Censo Web</strong></h3>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
@endsection
