@extends('layouts.blank')
@push('stylesheets')

@endpush
@section('htmlheader_title')
Editar Persona
@endsection

@section('main_container')
<div class="right_col" role="main">
<div class="">
<div class="row">
{{-- panel --}}
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel" style="background-color: #E8E8EC">
	<div class="x_title">
		<div class="pull-left"><h3><strong>Editar Comunero</strong></h3></div>
		<ul class="nav navbar-right panel_toolbox">
			<li><a class="link" a href="{{ route('grupo-familiar-create') }}"><i class="fa fa-reply-all" style="color: #337ab7"></i></a></li>
			<li><a class="collapse-link"><i class="fa fa-chevron-up" style="color: #26B99A"></i></a></li>
		</ul>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		{!! Form::model($personas,['method'=>'PUT', 'route'=>['persona-censoweb-update', $personas]]) !!}
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					{{-- primer nombre --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('nombre_1', 'Primer Nombre')!!}
						{!! Form::text('nombre_1',$personas->nombre_1, array('class'=>'form-control','required')) !!}
					</div>
					{{-- segundo nombre --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('nombre_2', 'Segundo Nombre')!!}
						{!! Form::text('nombre_2', $personas->nombre_2, array('class'=>'form-control')) !!}
					</div>
					{{-- primer apellido --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('apellido_1', 'Primer Apellido')!!}
						{!! Form::text('apellido_1', $personas->apellido_1, array('class'=>'form-control','required')) !!}
					</div>
					{{-- segundo apellido --}}
					<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('apellido_2', 'Segundo Apellido')!!}
						{!! Form::text('apellido_2', $personas->apellido_2, array('class'=>'form-control')) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="row">{{-- segunda fila  --}}
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">
					{{-- fecha Nacimiento --}}
						<div class="col-md-2 col-xs-12 col-sm-6 col-md-8 form-group">
							{!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
							{!! Form::date('fecha_nacimiento', $personas->fecha_nacimiento,['class' => 'form-control col-md-9 col-xs-6'],['style'=>"color: #B2BABB; width: 360px"]) !!}
						</div>
					{{-- genero --}}
					<div class="col-md-2 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('genero', 'Genero')!!}
						<select select name="genero" id="genero" class="form-control">
							@foreach ($generos as $genero)
							@if ($personas->genero_id == $genero->generos_id)
								<option value="{{ $genero->generos_id }}" selected>{{ $genero->genero }}</option>
							@else
								<option value{{ $genero->generos_id }}>{{ $genero->genero }}</option>
							@endif
							@endforeach
						</select>
					</div>
					{{-- Identificación --}}
					<div class="col-md-2 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('identificacion', 'Identificación')!!}
						{!! Form::text('identificacion', $personas->identificacion, array('placeholder'=>'Identificación', 'class'=>'form-control')) !!}
					</div>
					{{-- Expedicion --}}
					<div class="col-md-2 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('expedicion', 'Expedición')!!}
						{!! Form::text('expedicion', null, array('placeholder'=>'Expedición', 'class'=>'form-control')) !!}
					</div>
					{{-- Tipo Documento --}}
					<div class="col-md-2 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('tipo_doc', 'Tipo Documento')!!}
						<select select name="tipo_doc" id="tipo_doc" class="form-control">
							@foreach ($tiposdocumento as $tipodoc)
							@if ($personas->tipodoc_id == $tipodoc->tipodocs_id)
								<option value="{{ $tipodoc->tipodocs_id }}" selected>{{ $tipodoc->tipo_documento }}</option>
							@else
								<option value="{{ $tipodoc->tipodocs_id }}">{{ $tipodoc->tipo_documento }}</option>
							@endif
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
					<div class="col-md-2 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('telefono', 'Teléfono')!!}
						{!! Form::text('telefono', $personas->telefono, array('class'=>'form-control','required', 'onkeypress'=>'return numeros(event)')) !!}
					</div>
					{{-- Direccion --}}
					<div class="col-md-2 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group" >
						{!!Form::label('direccion', 'Dirección')!!}
						{!! Form::text('direccion', $personas->direccion, array('placeholder'=>'Dirección', 'class'=>'form-control','required')) !!}
					</div>
					{{-- Parentesco --}}
					<div class="col-md-2 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('parentesco', 'Parentesco')!!}
						<select select name="parentesco" id="parentesco" class="form-control">
							@foreach ($parentescos as $parentesco)
							@if ($personas->parentesco_id == $parentesco->parentescos_id)
								<option value="{{ $parentesco->parentescos_id }}" selected>{{ $parentesco->parentesco }}</option>
							@else
								<option value="{{ $parentesco->parentescos_id }}">{{ $parentesco->parentesco }}</option>
							@endif
							@endforeach
						</select>
					</div>
					{{-- Ocupación --}}
					<div class="col-md-2 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('ocupacion', 'Ocupación')!!}
						<select select name="ocupacion" id="ocupacion" class="form-control">
							@foreach ($ocupaciones as $ocupacion)
							@if ($personas->ocupacion_id == $ocupacion->ocupaciones_id)
								<option value="{{ $ocupacion->ocupaciones_id }}" selected>{{ $ocupacion->ocupacion }}</option>
							@else
								<option value="{{ $ocupacion->ocupaciones_id }}">{{ $ocupacion->ocupacion }}</option>
							@endif
							@endforeach
						</select>
					</div>
					{{-- niveles educativos --}}
					<div class="col-md-2 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('nivel_educativo', 'Nivel Educativo')!!}
						<select select name="nivel_educativo" id="nivel_educativo" class="form-control">
							@foreach ($niveles_educativos as $nivel_educativo)
								@if ($personas->nivelEducativo_id == $nivel_educativo->nivelesEducativos_id)
									<option value="{{$nivel_educativo->nivelesEducativos_id}}" selected>{{$nivel_educativo->nivel_educativo}}</option>}
									option
								@else
									<option value="{{$nivel_educativo->nivelesEducativos_id}}">{{$nivel_educativo->nivel_educativo}}</option>}
								@endif
							@endforeach
						</select>
					</div>
					{{-- Estado civil --}}
					<div class="col-md-2 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
						{!!Form::label('estado_civil', 'Estado Civil')!!}
						<select select name="estado_civil" id="estado_civil" class="form-control">
							<option value="">Estado Civil..</option>
							@foreach ($estadosciviles as $ecivil)
								@if ($personas->estadocivil_id == $ecivil->estadosciviles_id)
									<option value="{{$ecivil->estadosciviles_id}}" selected>{{$ecivil->estado_civil}}</option>
									
								@else
									<option value="{{$ecivil->estadosciviles_id}}">{{$ecivil->estado_civil}}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
				<div class="col-md-12 col-sm-12 col-xs-12 form-group">

				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar</button>
			{{--  --}}
			<a class="btn btn-danger btn-close" href="{{ route('grupo-familiar-index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>

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