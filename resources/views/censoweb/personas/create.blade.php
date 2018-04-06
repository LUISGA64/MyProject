@extends('layouts.blank')
{{-- Titulo de la pagina--}}
@section('htmlheader_title')
Agregar Persona - {{ $grupofamiliar->id }}
@endsection

@section('main_container')
<div class="right_col" role="main">
<div class="error" style="margin-top: 60px">
	{{--Errores--}}
	@include('errors.error')
</div>
{!! Form::open(['route' => ['idGrupoFamiliar',$grupofamiliar->id],'method' =>'POST','class'=>'form-horizontal']) !!}
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="background-color: #F2F3F4">
			<div class="x_title">
				<h4>Agregar Usuario - Ficha Familiar: {{ $grupofamiliar->id }}</h4>
			</div>
			<div class="x_content">
				<div class="row" id="primer_fila">
					<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							{{-- primer nombre --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group" >
								{!!Form::label('nombre_1', 'Primer Nombre')!!}
								{!! Form::text('nombre_1', null, array('placeholder'=>'Primer Nombre', 'class'=>'form-control')) !!}
							</div>
							{{-- segundo nombre --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group" >
								{!!Form::label('nombre_2', 'Segundo Nombre')!!}
								{!! Form::text('nombre_2', null, array('placeholder'=>'Segundo Nombre', 'class'=>'form-control')) !!}
							</div>
							{{-- primer apellido --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group" >
								{!!Form::label('apellido_1', 'Primer Apellido')!!}
								{!! Form::text('apellido_1', null, array('placeholder'=>'Primer Apellido', 'class'=>'form-control')) !!}
							</div>
							{{-- segundo apellido --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group" >
								{!!Form::label('apellido_2', 'Segundo Apellido')!!}
								{!! Form::text('apellido_2', null, array('placeholder'=>'Segundo Apellido', 'class'=>'form-control')) !!}
							</div>
						</div>
					</div>
				</div>
				{{--  --}}
				<div class="row">{{-- segunda fila  --}}
					<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							{{-- fecha Nacimiento --}}
							<div class="col-md-2 col-xs-12 col-sm-12 form-group" >
								{!!Form::label('fecha_nacimiento', 'Fecha Nacimiento')!!}
								{{--  {!! Form::date('fecha_nacimiento', null, array('class'=>'form-control')) !!}--}}
								{!! Form::date('fecha_nacimiento',\Carbon\Carbon::createFromFormat('d/m/Y','01/01/1900')->toDateTimeString(),['class'=>'form-control']) !!}
							</div>
							{{-- genero --}}
							<div class="col-md-2 col-xs-12 col-sm-12 form-group">
								{!!Form::label('genero', 'Genero')!!}
								{!! Form::select('genero', $generos->pluck('genero','generos_id'),null, ['class' => 'form-control','placeholder' => 'Selecciona..']) !!}
							</div>
							{{-- Identificación --}}
							<div class="col-md-2 col-xs-12 col-sm-12 form-group" >
								{!!Form::label('identificacion', 'Identificación')!!}
								{!! Form::text('identificacion', null, array('placeholder'=>'Identificación', 'class'=>'form-control')) !!}
							</div>
							{{-- Lugar Expedicion --}}
							<div class="col-md-3 col-xs-12 col-sm-12 form-group" >
								{!!Form::label('expedicion', 'Expedición')!!}
								{!! Form::text('expedicion', null, array('placeholder'=>'Expedición', 'class'=>'form-control')) !!}
							</div>
							{{-- Tipo Documento --}}
							<div class="col-md-3 col-xs-12 col-sm-12 form-group">
								{!!Form::label('tipo_doc', 'Tipo Documento')!!}
								{!! Form::select('tipodocs_id', $tiposdocumento->pluck('tipo_documento', 'tipodocs_id'), null, ['class' => 'form-control', 'placeholder' => 'Selecciona..']) !!}
							</div>
						</div>
					</div>
				</div>
				{{-- --}}
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							{{-- telefono --}}
							<div class="col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
								{!!Form::label('telefono', 'Teléfono')!!}
								{!! Form::text('telefono', null, array('placeholder'=>'Teléfono', 'class'=>'form-control', 'onkeypress'=>'return numeros(event)')) !!}
							</div>
							{{-- Direccion --}}
							<div class="col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
								{!!Form::label('direccion', 'Dirección')!!}
								{!! Form::text('direccion', null, array('placeholder'=>'Dirección', 'class'=>'form-control')) !!}
							</div>
							{{-- Parentesco --}}
							<div class="col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
								{!!Form::label('parentesco', 'Parentesco')!!}
								{!! Form::select('parentesco', $parentescos->pluck('parentesco','parentescos_id'),null,['class' => 'form-control', 'placeholder' => 'Selecciona..']) !!}
							</div>
							{{-- Cabeza de Hogar --}}
							<div class="col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
								{!!Form::label('cabezahogar', 'Cabeza Hogar')!!}<br>
								{!! Form::select('cabezahogar', ['T' => 'Si', 'F' => 'No'],null,['class' => 'form-control', 'placeholder' => 'Selecciona..']) !!}
							</div>
						</div>
					</div>
				</div>
				{{--  --}}
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							{{-- Ocupación --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group">
								{!!Form::label('ocupacion', 'Ocupación')!!}
								{!! Form::select('ocupacion', $ocupaciones->pluck('ocupacion','ocupaciones_id'),null,['class' => 'form-control', 'placeholder' => 'Selecciona..']) !!}
							</div>
							{{-- niveles educativos --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group">
								{!!Form::label('nivel_educativo', 'Nivel Educativo')!!}
								{!! Form::select('nivel_educativo', $niveles_educativos->pluck('nivel_educativo','nivelesEducativos_id'),null,['class' => 'form-control', 'placeholder' => 'Selecciona..']) !!}
							</div>
							{{-- Estado civil --}}
							<div class="col-md-3 col-xs-12 col-sm-6 form-group">
								{!!Form::label('estado_civil', 'Estado Civil')!!}
								{!! Form::select('estado_civil', $estadosciviles->pluck('estado_civil','estadosciviles_id'),null,['class' => 'form-control', 'placeholder' => 'Selecciona..']) !!}
							</div>
						</div>
					</div>
				</div>
				{{--  --}}
				<div class="modal-footer">
					<div class="row">
						<button type="submit" class="btn btn-success" title="Agregar"><span class="glyphicon glyphicon-user"></span> Agregar</button>

						<a class="btn btn-dark btn-close" href="{{ route('grupo-familiar-index') }}" title="Regresar"><span> <i class="fa fa-home"> Regresar</i></span></a>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection