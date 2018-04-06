@extends('layouts.blank')


@section('htmlheader_title')
Listado Comuneros
@endsection

@section('main_container')
<div class="right_col" role="main">

  <div class="">
    <div class="row">
      <table id="myTable" class="table table-striped table-bordered table-hover table-condensed table-responsive" style="margin-left: 5px; margin-right: 15px">
        <caption><h3>Ficha Familiar Número: <strong>{{ $id }}</strong> </h3></caption>
        <thead>
          <tr style="background-color: #34495E; color: #FDFEFE;">
            <th style="text-align: center; width: 20%">Familiar</th>
            <th style="text-align: center; width: 20%">Sexo</th>
            <th style="text-align: center; width: 20%">Dirección</th>
            <th style="text-align: center; width: 20%">Teléfono</th>
            <th style="text-align: center; width: 20%">Parentesco</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($grupos as $grupo)
          <tr>
            <td>{{$grupo->nombre_1}} {{$grupo->nombre_2}} {{$grupo->apellido_1}} {{$grupo->apellido_2}}</td>
            <td>{{ $grupo->genero }}</td>
            <td>{{ $grupo->direccion }}</td>
            <td>{{ $grupo->telefono }}</td>
            <td>{{ $grupo->parentesco }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"></legend>
  </div>
  <div>
    <a class="btn btn-info" style="margin-left: 15px" href="{{ route('grupo-familiar-index') }}"><span> <i class="fa fa-home"> Volver</i></span></a>
    <a class="btn btn-dark" style="margin-left: 15px" href="{{ route('grupo-familiar-print',[$id]) }}"><span> <i class="fa fa-print"> Imprimir</i></span></a>
  </div>
</div>
@endsection
@push('scripts')

<script>
  $(document).ready(function() {
    $('#myTable').DataTable( {
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