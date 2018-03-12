@extends('layouts.blank')

@section('htmlheader_title')
Comuneros
@stop

@push('stylesheets')
<!-- Example -->
@endpush


@section('main_container')
<div class="right_col" role="main">

	<div class="">
		<div class="row">
			<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="personas">
				<thead>
					<tr style="background-color: #17A589; color: #FDFEFE">
						<th>Id</th>
						<th style="text-align: center">Tipo Documento</th>
						<th style="text-align: center">Identificación</th>
						<th style="text-align: center">Nombres y Apellidos</th>
						<th style="text-align: center">Género</th>
						<th style="text-align: center">Fecha Nacimiento</th>
						<th style="text-align: center">Edad</th>
						<th style="text-align: center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($personas as $persona)
					<tr>
						<td>{{ $persona->id_persona }}</td>
						<td>{{ $persona->codigo_doc }}</td>
						<td>{{ $persona->identificacion }}</td>
						<td>{{ $persona->nombre_1 }} {{ $persona->nombre_2 }} {{ $persona->apellido_1 }} {{ $persona->apellido_2 }}</td>
						<td>{{ $persona->genero }}</td>
						<td>{{ $persona->fecha_nacimiento }}</td>
						<td>{{ $persona->edad }}</td>
						<td>
							<a class="btn btn-warning btn-sm" href="{{ route('persona-censoweb-edit',$persona->id_persona) }}"> <span class="btn-label">  <i class="fa fa-edit"> Editar</i></span></a>

							<a class="btn btn-info btn-sm" href="{{ route('aval-create', $persona->id_persona) }}"> <span class="btn-label">  <i class="fa fa-book"> Aval</i></span></a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
@push('scripts')
<script>
	$(document).ready(function() {
		$('#personas').DataTable( {
			"language": {
				"lengthMenu": "Mostrar: _MENU_ registros por página",
				"zeroRecords": "No se encontraron coincidencias",
				"info": "Página _PAGE_ of _PAGES_",
				"infoEmpty": "No hay registros por mostrar",
				"infoFiltered": "(filtrado de _MAX_ registros)",
				"search": "Buscar"
			}
		} );
	} );
</script>
@endpush