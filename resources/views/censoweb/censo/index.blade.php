@extends('layouts.blank')

@push('stylesheets')
	{{-- Datatables --}}

        
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
				<div class="pull-left">
					
				</div>


				<div class="pull-right">
					@permission('crear-grupo-familiar')
					<a class="btn btn-success" title="Crear Ficha Familiar" href="{{ route('grupo-familiar-create') }}"><span class="btn-label"> <i class="fa fa-plus"></i></span> Grupo Familiar</a>
					@endpermission
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table table-striped table-bordered table-hover table-condensed table-responsive" id="myTable">
					<thead>
						<tr style="background-color: #34495E; color: #FDFEFE;">
							<th style="text-align: center;">Ficha</th>
							<th style="text-align: center;">Dirección</th>
							<th style="text-align: center;">Identificación</th>
							<th style="text-align: center;">Primer Nombre</th>
							
							<th style="text-align: center;">Acciones</th>
						</tr>
					</thead>
					<tbody>
            @foreach($grupos as $grupo)
              <tr>
                <td>{{ $grupo->numero_ficha }}</td>
                <td>{{ $grupo->direccion }}</td>
                <td>{{ $grupo->identificacion }}</td>
                <td>{{ $grupo->nombre_1 }} {{ $grupo->nombre_2 }} {{ $grupo->apellido_1 }} {{ $grupo->apellido_2 }}</td>
                
                <td style="text-align: center;">
                <a class="btn-dark btn-sm" title="Editar" href="{{ route('personagrupo-familiar.edit', $grupo->id) }}"> <span class="btn-label"> <i class=" fa fa-edit"> Editar</i></span></a>

                <a class="btn-success btn-sm" title="Agregar Familiar" href="{{ route('personagrupo-familiar.new',[$grupo->id]) }}"> <span class="btn-label">  <i class="fa fa-user-plus"> Usuario</i></span></a>

                <a class="btn-info btn-sm" title="Núcleo Familiar" href="{{ route('grupo-familiar.show',[$grupo->id]) }}"><span class="btn-label"><i class="fa fa-users"> Familiares</i></span></a>
                
              </td>
              </tr>
            @endforeach
          </tbody>
				</table>
				{{-- <div style="align-content: center;">
					{{ $grupos->links() }}
				</div> --}}
			</div>
		</div>
	</div>
</div>

@stop

@push('scripts')

<script>
  $(document).ready(function() {
    $('#myTable').DataTable( {
        "language": {
            "lengthMenu": "Mostrar: _MENU_ registros por página",
            "zeroRecords": "No se encontraron coincidencias",
            "info": "Página _PAGE_ of _PAGES_",
            "infoEmpty": "No hay registros por mostrar",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar"
        }
    } );
} );
</script>
@endpush

