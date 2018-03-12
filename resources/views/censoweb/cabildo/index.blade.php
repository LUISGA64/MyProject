@extends('layouts.blank')

@section('htmlheader_title')
Integrantes Cabildo
@endsection

@section('main_container')
<div class="right_col" role="main">
	<div class="">
		<div class="row" >
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<div class="pull-left">
					{{-- Sección Botón Izquierda --}}
					
					{{-- <a class="btn btn-warning" style="margin-bottom: 5px; margin-top: 10px; " href="#"><span class="btn-label"> <i class="fa fa-pencil" style="color: #FDFEFE "></i></span> Editar Resguardo</a> --}}
					
				</div>
				{{-- Botón Derecha --}}
				<div class="pull-right">
					@permission('crear_integrante')
					<a class="btn btn-success" style="margin-bottom: 5px; margin-top: 10px; background-color: #3EB2AB" href="{{ route('cabildo.create') }}"><span class="btn-label"> <i class="fa fa-university" style="color: #FDFEFE "></i></span> Agregar Integrante</a>
					@endpermission

				</div>
			</div>
		</div>
	</div><br>
	{{--  --}}
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="x_panel" style="border: none; margin-top: 0px" >
			<div class="x_title" style="border: none"></div>
			<div class="x_content">
				<table class="table table-striped">
					<h4><strong>Integrantes Principales</strong></h4>
					<thead>
						<tr>
							<th>Comunero</th>
							<th>Cargo</th>
							<th style="text-align: center;">Editar</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($gobp as $gob)
						<tr>
							<td>{{ $gob->integrante }}</td>
							<td>{{ $gob->cargo }}</td>
							<td style="width: 5%"><a class="btn " style="font-size: 14px; color: #3EB2AB" href="{{ route('cabildo.edit',[$gob->integrantes_id]) }}"> <span class="btn-label">  <i class="fa fa-edit"> Editar</i></span></a></td>
						</tr>	
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{-- panel 1 --}}
	<div class="col-md-6 col-sm-12 col-xs-12">
		<div class="x_panel" style="border: none; margin-top: 0px" >
			<div class="x_title" style="border: none"></div>
			<div class="x_content">
				<form class="form-horizontal form-label-right">
					<table class="table table-striped table-responsive">
						<h4><strong>Integrantes Suplentes</strong></h4>
						<thead>
							<tr>
								<th>Comunero</th>
								<th>Cargo</th>
								<th style="text-align: center;">Editar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($intspl as $ispl)
							<tr>
								<td>{{ $ispl->integrante }}</td>
								<td>{{ $ispl->car }}</td>
								<td style="width: 5%"><a class="btn " style="font-size: 14px; color: #3EB2AB" href="{{ route('cabildo.edit',[$ispl->integrantes_id]) }}"> <span class="btn-label">  <i class="fa fa-edit"> Editar</i></span></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
@endsection