@extends('layouts.blank')

@push('stylesheets')
    
@endpush

@section('htmlheader_title')
	Grupo Familiar
@endsection

@section('main_container')
<div class="right_col" role="main">
<div class="">
	{{-- inicio del codigo --}}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="pull-right">
				@permission('crear-grupo-familiar')
				<a class="btn btn-success" style="margin-bottom: 5px; margin-top: 10px" href="{{ route('censo.create') }}"><span class="btn-label"> <i class="fa fa-plus"></i></span> Grupo Familiar</a>
				@endpermission
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 5px">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table id="datatable" class="table table-striped table-bordered table-hover table-condensed table-responsive">
			<thead>
				<tr style="background-color: #34495E; color: #FDFEFE">
					<th style="text-align: center;"><h4>Ficha</h4></th>
					<th style="text-align: center;"><h4>Dirección</h4></th>
					<th style="text-align: center;"><h4>Zona</h4></th>
					<th style="text-align: center;"><h4>Cabeza Hogar</h4></th>
					<th style="text-align: center;"><h4>Acciones</h4></th>
				</tr>
			</thead>
			<tbody>
				@foreach($grupos as $grupo)
				<tr>
					<td><strong>{{ $grupo->numero_ficha }}</strong></td>
					<td>{{ $grupo->direccion }}</td>
					<td>{{ $grupo->zona }}</td>
					<td>{{$grupo->nombre_1}} {{$grupo->nombre_2}} {{$grupo->apellido_1}} {{$grupo->apellido_2}}</td>
					<td style="align: center">
						<a class="btn btn-warning" href="{{ route('personagrupo-familiar.edit', $grupo->id) }}">Editar</a>
						{{-- <a class="btn btn-danger" href="">Eliminar</a> --}}
						<a class="btn btn-success" href="{{ route('personagrupo-familiar.new',[$grupo->id]) }}">Usuario</a>
					</td>

					
				</tr>
				@endforeach
			</tbody>
		</table>
		<div style="align-content: center;">
			{{ $grupos->links() }}
		</div>
		</div>
	</div>
</div>

</div>
@endsection