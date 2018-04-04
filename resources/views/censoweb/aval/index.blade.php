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
        <div class="controls-row">
            <div class="pull-right">
                {{--<a href="{{ route('aval-excel') }}" class="btn btn-default"> <i class="fa fa-file-excel-o" style="color: #1e8a29"></i> Excel </a>--}}
            </div>
        </div>

		<div class="row">
			<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="aval">
				<thead>
					<tr style="background-color: #17A589; color: #FDFEFE">
						<th>N°</th>
						<th style="text-align: center">Nombres y Apellidos</th>
						<th style="text-align: center">Entidad Solicita</th>
						<th style="text-align: center">Cargo Aspira</th>
						<th style="text-align: center">Formato</th>
						<th style="text-align: center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($avals as $aval)
					<tr>
						<td>{{ $aval->avals_id }}</td>
						<td>{{ $aval->nombre_1 }} {{ $aval->nombre_2 }} {{ $aval->apellido_1 }} {{ $aval->apellido_2 }}</td>
						<td>{{ $aval->entidadSolicita }}</td>
						<td>{{ $aval->cargoAspirante }}</td>
						<td>{{$aval->formato}}</td>
						<td style="text-align: center">
							{{-- <a class="btn btn-info btn-sm" href="{{ route('aval-pdf', $aval->avals_id) }}"> <span class="btn-label">  <i class="fa fa-pdf"> Aval</i></span></a> --}}
							@permission('imprimir_aval')
							<a href="{{ action('Principal\AvalController@avalPdf', $aval->avals_id)}}" class="btn btn-default"><i class="fa fa-file-pdf-o" style="color: #e73f28"></i> Pdf</a>
							@endpermission

							@permission('prueba')
							<a href="{{ route('aval.excel') }}">Excel</a>
							@endpermission
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
		$('#aval').DataTable( {
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