@extends('layouts.blank')
@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush
@section('htmlheader_title')
Crear Personas
@endsection
@section('main_container')
<div class="right_col" role="main">
<div class="">
<div class="row">
{{-- panel --}}
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
	<div class="x_title">
		<div class="pull-left"><h3><strong>Ficha Familiar: {{ $grupofamiliar->id }}</strong></h3></div>
		<ul class="nav navbar-right panel_toolbox">
			<li><a class="link" a href="{{ route('grupo-familiar-create') }}"><i class="fa fa-reply-all" style="color: #337ab7"></i></a></li>
			<li><a class="collapse-link"><i class="fa fa-chevron-up" style="color: #26B99A"></i></a></li>
		</ul>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		{!! Form::open(array('route'=>array('idGrupoFamiliar', $grupofamiliar->id))) !!}

		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					{{-- primer nombre --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('nombre_1', 'Primer Nombre')!!}
						{!! Form::text('nombre_1', null, array('placeholder'=>'Primer Nombre', 'class'=>'form-control','required')) !!}
					</div>
					{{-- segundo nombre --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('nombre_2', 'Segundo Nombre')!!}
						{!! Form::text('nombre_2', null, array('placeholder'=>'Segundo Nombre', 'class'=>'form-control')) !!}
					</div>
					{{-- primer apellido --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('apellido_1', 'Primer Apellido')!!}
						{!! Form::text('apellido_1', null, array('placeholder'=>'Primer Apellido', 'class'=>'form-control','required')) !!}
					</div>
					{{-- segundo apellido --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('apellido_2', 'Segundo Apellido')!!}
						{!! Form::text('apellido_2', null, array('placeholder'=>'Segundo Apellido', 'class'=>'form-control')) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="row">{{-- segunda fila  --}}
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					{{-- fecha Nacimiento --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('fecha_nacimiento', 'Fecha Nacimiento')!!}
						{!! Form::date('fecha_nacimiento', \Carbon\Carbon::now(), array('class'=>'form-control','style' => 'height: 33px','required')) !!}
					</div>
					{{-- genero --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('genero', 'Genero')!!}
						<select select name="genero" id="genero" class="form-control">
							<option value="">Genero..</option>
							@foreach ($generos as $genero)
							<option value="{{ $genero['id'] }}">{{ $genero['genero'] }}</option>
							@endforeach
						</select>
					</div>
					{{-- Identificación --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('identificacion', 'Identificación')!!}
						{!! Form::text('identificacion', null, array('placeholder'=>'Identificación', 'class'=>'form-control')) !!}
					</div>
					{{-- Tipo Documento --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('tipo_doc', 'Tipo Documento')!!}
						<select select name="tipo_doc" id="tipo_doc" class="form-control">
							<option value="">Tipo Documento..</option>
							@foreach ($tiposdocumento as $tipodoc)
							<option value="{{ $tipodoc['id'] }}">{{ $tipodoc['tipo_documento'] }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					{{-- telefono --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('telefono', 'Teléfono')!!}
						{!! Form::text('telefono', null, array('placeholder'=>'Teléfono', 'class'=>'form-control','required', 'onkeypress'=>'return numeros(event)')) !!}
					</div>
					{{-- Direccion --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('direccion', 'Dirección')!!}
						{!! Form::text('direccion', null, array('placeholder'=>'Dirección', 'class'=>'form-control','required')) !!}
					</div>
					{{-- Parentesco --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('parentesco', 'Parentesco')!!}
						<select select name="parentesco" id="parentesco" class="form-control">
							<option value="">Parentesco..</option>
							@foreach ($parentescos as $parentesco)
							<option value="{{ $parentesco['id'] }}">{{ $parentesco['parentesco'] }}</option>
							@endforeach
						</select>
					</div>
					{{-- Cabeza de Hogar --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('cabezahogar', 'Cabeza Hogar')!!}<br>
						{!! Form::select('cabezahogar', ['T' => 'Si', 'F' => 'No']) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					{{-- Ocupación --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('ocupacion', 'Ocupación')!!}
						<select select name="ocupacion" id="ocupacion" class="form-control">
							<option value="">Ocupación..</option>
							@foreach ($ocupaciones as $ocupacion)
							<option value="{{ $ocupacion['id'] }}">{{ $ocupacion['ocupacion'] }}</option>
							@endforeach
						</select>
					</div>
					{{-- niveles educativos --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('nivel_educativo', 'Nivel Educativo')!!}
						<select select name="nivel_educativo" id="nivel_educativo" class="form-control">
							<option value="">Nivel Educativo..</option>
							@foreach ($niveles_educativos as $nivel_educativo)
							<option value="{{ $nivel_educativo['id'] }}">{{ $nivel_educativo['nivel_educativo'] }}</option>
							@endforeach
						</select>
					</div>
					{{-- Estado civil --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('estado_civil', 'Estado Civil')!!}
						<select select name="estado_civil" id="estado_civil" class="form-control">
							<option value="">Estado Civil..</option>
							@foreach ($estadosciviles as $ecivil)
							<option value="{{ $ecivil['id'] }}">{{ $ecivil['estado_civil'] }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agregar</button>
			{{--  --}}
			<a class="btn btn-danger btn-close btn-lg" href="{{ route('grupo-familiar-index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>

		</div>
	</div>
	{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
</div>
@endsection