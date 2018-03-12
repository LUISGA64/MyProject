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
		{!!Form::open(array('route'=>'aval-store', 'method'=>'POST', 'class'=>'form-horizontal'))!!}
		{!! Form::hidden('pers',$persona->id_persona) !!}
		{{-- resguardo --}}
		<div class="form-group">
			{!!Form::label('resguardo', 'Resguardo', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'))!!}
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" id="resguardo" select name="resguardo">
					<option value="aval">Resguardo</option>
					@foreach($resguardo as $resg)
						<option value="{{ $resg['id'] }}">{{ $resg['resguardo'] }}</option>
					@endforeach
				</select>
			</div>
		</div>
		{{-- Persona para el aval --}}
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="integrante">Nombres y Apellidos</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				{!! Form::text('persona', $persona->nombre_1.' '.$persona->nombre_2.' '.$persona->apellido_1.' '.$persona->apellido_2, array('class'=>'form-control col-md-7 col-xs-12')) !!}
			</div>
		</div>
		{{-- Identificacion --}}
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="integrante">Identificación</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				{!! Form::text('identificacion', $persona->identificacion, array('class'=>'form-control col-md-7 col-xs-12')) !!}
			</div>
		</div>
		{{-- Tipo Documento --}}
		<div class="form-group">
			{!!Form::label('documentosolicitado', 'Documento Solicitado', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'))!!}
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" name="documentosolicitado">
					<option value="aval">Aval</option>
					<option value="constancia">Constancia</option>
				</select>
			</div>
		</div>
		{{-- Entidad Solicita --}}
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="integrante">Entidad Requiere</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				{!! Form::text('entSolicita',null, array('class'=>'form-control col-md-7 col-xs-12')) !!}
			</div>
		</div>
		{{-- Accion a Realizar --}}
		<div class="form-group">
			{!!Form::label('detalle', 'Actividad a Realizar', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'))!!}
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" name="detalle" id="detalle">
					<option value="">Selecciona....</option>
					<option value="trabajar">Trabajar</option>
					<option value="pasantia">Practicar</option>
				</select>
			</div>
		</div>
		{{-- Entidad Solicita --}}
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="integrante">Cargo</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				{!! Form::text('cargo',null, array('class'=>'form-control col-md-7 col-xs-12')) !!}
			</div>
		</div>
		{{--  --}}
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"> </span> Guardar</button>
				<a class="btn btn-danger btn-close" href="{{ route('personagrupo-familiar.index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>
				
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@stop
@push('scripts')

@endpush