@extends('layouts.blank')
@push('stylesheets')

@endpush
@section('htmlheader_title')
<h1>Editar</h1>
@endsection
@section('main_container')
{!! Form::model($grupos,['method'=>'PUT', 'route'=>['grupo-familiar-update', $grupos]]) !!}
<div class="right_col" role="main">
{{-- Boton que retorna al index de censo --}}
<div class="row"></div>
{{-- Error --}}
@if(count($errors)>0)
<div class="">
{{-- alert()->error('Error Message', 'Optional Title'); --}}
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<!-- page content -->
<div class="" role="main">
<div class="">        
<div class="clearfix"></div>
{{-- encabezado del panel --}}
<div class="row" style="margin-top: 5px; margin-bottom: 50px">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="link" a href="{{ route('grupo-familiar-index') }}"><i class="fa fa-reply-all" style="color: #337ab7"></i></a></li>
				<li><a class="collapse-link"><i class="fa fa-chevron-up" style="color: #26B99A"></i></a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		{{-- contenido del panel --}}
		<div class="x_content">
			<div class="row">{{-- PRIMER FILA DEL FORMULARIO --}}
				<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
					<div class="col-md-12 col-sm-12 col-xs-12 form-group">
						{{-- Ficha familiar --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback" >
							{!!Form::label('ficha', 'Número Ficha')!!}
							{!! Form::text('ficha', $grupos->numero_ficha, array('placeholder'=>'Número Ficha', 'class'=>'form-control has-feedback-left')) !!}
							<span class="fa fa-location-arrow form-control-feedback left" ></span>
						</div>
						{{-- Direccion --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback" >
							{!!Form::label('direccion', 'Dirección')!!}
							{!! Form::text('direccion', $grupos->direccion, array('placeholder'=>'Dirección', 'class'=>'form-control has-feedback-left', 'style' =>'color: #0B3861')) !!}
							<span class="fa fa-location-arrow form-control-feedback left" ></span>
						</div>
						{{-- Tipo de Vivienda --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							{!!Form::label('tipo_vivienda', 'Tipo Vivienda')!!}
							<select select name="tipo_vivienda" id="tipo_vivienda" value ="{{ $grupos->tiposvivienda }}" class="form-control">
								{{-- <option value="">Tipo Vivienda..</option> --}}
								@foreach ($tiposvivienda as $tipvivienda)
								<option value="{{ $tipvivienda['id'] }}">{{ $tipvivienda['tipo_vivienda'] }}</option>
								@endforeach
							</select>
						</div>
						{{-- zONA --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							{!!Form::label('zona', 'Zona')!!}
							<select name="zona" class="form-control" value="{{ $grupos->zona }}" id="zona">
								{{-- <option value="">Seleccione</option> --}}
								<option value="U">Zona Urbana</option>
								<option value="R">Zona Rural</option>
							</select>  
						</div>
					</div>
				</div>
			</div>{{-- Fin primer ROW --}}
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
					<div class="col-md-12 col-sm-12 col-xs-12 form-group">
						<legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"><strong>Actividad Economica</strong></legend>
						{{-- Actividad Economica --}}
						<div class="col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
							{!!Form::label('id_acteconomica', 'Actividad Económica')!!}
							<select name="" id="id_acteconomica" value="{{ $grupos->acteconom }}" class="form-control">
								{{-- <option value="">Actividad Económica..</option> --}}
								@foreach ($acteconom as $actec)
								<option value="{{ $actec->id }}">{{ $actec->actividad_economica }}</option>
								@endforeach
							</select>
						</div>
						{{-- Tipo de Actividad Economica --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							{!!Form::label('id_tipact', 'Tipo Actividad')!!}
							<select name="id_tipact" class="form-control" id="id_tipact" >
								<option value="$id_tipact">Tipo Actividad</option>
							</select>  
						</div>
						{{-- Hectareas --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback" >
							{!!Form::label('hectareas', 'Hectáreas')!!}
							{!! Form::text('hectareas', null, array('placeholder'=> 'Hectareas', 'class'=>'form-control has-feedback-left','style' =>'color: #0B3861')) !!}
							<span class="fa fa-dedent form-control-feedback left"></span>
						</div>
					</div>
				</div>
			</div>{{-- Fin del Segundo Row --}} 
			<div class="Row">{{-- Inicio del 3 row --}}
				<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
					<div class="col-md-12 col-sm-12 col-xs-12 form-group">
						<legend class="legendStyle" style="margin-bottom: 1px; color: #26B99A"><strong>Material Vivienda</strong></legend>
					</div>
				</div>
				{{-- Material Techo --}}
				<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
					{!!Form::label('mat_techo', 'Material Techo')!!}
					<select select name="mat_techo" id="tipo_vivienda" value="{{ $grupos->mattecho }}" class="form-control">
						{{-- <option value="">Seleccione Material..</option> --}}
						@foreach ($materialestecho as $mattecho)
						<option value="{{ $mattecho['id'] }}">{{ $mattecho['material_techo'] }}</option>
						@endforeach
					</select>
				</div>
				{{-- Material Pisos --}}
				<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
					{!!Form::label('mat_piso', 'Material Pisos')!!}
					<select select name="mat_piso" id="mat_piso" value="{{ $grupos->matpiso }}" class="form-control">
						{{-- <option value="">Seleccione Material..</option> --}}
						@foreach ($materialespiso as $matpiso)
						<option value="{{ $matpiso['id'] }}">{{ $matpiso['material_piso'] }}</option>
						@endforeach
					</select>
				</div>
				{{-- Material Paredes --}}
				<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
					{!!Form::label('mat_paredes', 'Material Paredes')!!}
					<select select name="mat_paredes" id="mat_paredes" value="{{ $grupos->materialparedes }}" class="form-control">
						{{-- <option value="">Seleccione Material..</option> --}}
						@foreach ($materialparedes as $matpared)
						<option value="{{ $matpared['id'] }}">{{ $matpared['material_pared'] }}</option>
						@endforeach
					</select>
				</div>
			</div>{{-- Fin del 3 row Materiales Construccion --}}
			<div class="row" id="row_3">{{-- inicio del 3 row --}}
				<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
					<div class="col-md-12 col-sm-12 col-xs-12 form-group">
						<legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"><strong>Saneamiento Básico</strong></legend>
						{{-- Consumo Agua --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							<div class="col-md-12 col-sm-12 col-xs-12 form-group" style="border:1px solid #D3D8DA;">
								<h5>{!!Form::label('consumoagua', 'Consumo Agua')!!}</h5>
								@foreach($consumosagua as $consagua)
								@if($grupos->id_consumo_agua == $consagua->id )
								{!! Form::radio('consumoagua', $consagua->id,true) !!} <strong>{{ $consagua->consumo_agua }}</strong>
								@elseif($grupos->id_consumo_agua <> $consagua->id)
								{!! Form::radio('consumoagua', $consagua->id) !!} <strong>{{ $consagua->consumo_agua }}</strong>
								@endif
								<br>
								{{-- {!! Form::radio('consumoagua', $consagua->id) !!} <strong>{{ $consagua->consumo_agua }}</strong> --}}
								@endforeach
							</div>
						</div>
						{{-- Aguas Servidas --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							<div class="col-md-12 col-sm-12 col-xs-12 form-group" style="border:1px solid #D3D8DA;">
								<h5>{!!Form::label('aguaservidas', 'Aguas Servidas')!!}</h5>
								@foreach($aguaservidas as $aguaser)
								@if($grupos->id_aguas_servidas == $aguaser->id)
								{!! Form::radio('aguaservidas', $aguaser->id, true) !!} <strong>{{ $aguaser->det_aguaservidas }}</strong>
								@elseif($grupos->id_aguas_servidas <> $aguaser->id)
								{!! Form::radio('aguaservidas', $aguaser->id) !!} <strong>{{ $aguaser->det_aguaservidas }}</strong>
								@endif
								<br>
								@endforeach
							</div>
						</div>
						{{-- Eliminacion Excretas --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							<div class="col-md-12 col-sm-12 col-xs-12 form-group" style="border:1px solid #D3D8DA;">
								<h5>{!!Form::label('excretas', 'Elimina Excretas')!!}</h5>
								@foreach($excretas as $excreta)
								@if($grupos->id_elimina_excretas == $excreta->id)
								{!! Form::radio('excreta', $excreta->id, true) !!} <strong>{{ $excreta->eliminar_excretas }}</strong>
								@elseif($grupos->id_elimina_excretas <> $excreta->id)
								{!! Form::radio('excreta', $excreta->id) !!} <strong>{{ $excreta->eliminar_excretas }}</strong>
								@endif
								<br>
								@endforeach
							</div>
						</div>
						{{-- Tipo Alumbrado --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							<div class="col-md-12 col-sm-12 col-xs-12 form-group" style="border:1px solid #D3D8DA;">
								<h5>{!!Form::label('alumbrado', 'Tipo Alumbrado')!!}</h5>
								@foreach($tiposalumbrado as $tipalum)
								@if($grupos->id_tipo_alumbrado == $tipalum->id)
								{!! Form::radio('alumbrado', $tipalum->id, true) !!} <strong>{{ $tipalum->tipo_alumbrado }}</strong>
								@elseif($grupos->id_tipo_alumbrado <> $tipalum->id)
								{!! Form::radio('alumbrado', $tipalum->id, true) !!} <strong>{{ $tipalum->tipo_alumbrado }}</strong>
								@endif
								<br>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>{{-- fin del 4 row --}}
			{{-- inicio del 5 row --}}
			<div class="row" id="row_4">
				<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
					<div class="col-md-12 col-sm-12 col-xs-12 form-group">
						<legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"><strong>Riesgos Vivienda</strong></legend>
						{{-- Riesgos Vivienda --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							<div class="col-md-12 col-sm-12 col-xs-12 form-group" style="border:1px solid #D3D8DA;">
								<h5>{!!Form::label('riesgovivienda', 'Riesgos Vivienda')!!}</h5>
								@foreach($riesgos as $riesgovivienda)
								@if($grupos->id_riesgo_vivienda == $riesgovivienda->id)
								{!! Form::radio('riesgovivienda', $riesgovivienda->id, true) !!} <strong>{{ $riesgovivienda->riesgo }}</strong><br>
								@elseif($grupos->id_riesgo_vivienda <> $riesgovivienda->id)
								{!! Form::radio('riesgovivienda', $riesgovivienda->id) !!} <strong>{{ $riesgovivienda->riesgo }}</strong><br>
								@endif
								@endforeach
							</div>
						</div>
						{{-- Vectores Vivienda --}}
						<div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
							<div class="col-md-12 col-sm-12 col-xs-12 form-group" style="border:1px solid #D3D8DA;">
								<h5>{!!Form::label('vectorvivienda', 'Vectores Vivienda')!!}</h5>
								@foreach($vectores as $vector)
								@if($grupos->id_vector_viviendas == $vector->id)
								{!! Form::radio('vectorvivienda', $vector->id, true) !!} <strong>{{ $vector->vector_vivienda }}</strong><br>
								@elseif($grupos->id_vector_viviendas <> $vector->id)
								{!! Form::radio('vectorvivienda', $vector->id) !!} <strong>{{ $vector->vector_vivienda }}</strong><br>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" >
		<div class="col-md-6 col-md-12 col-xs-12 col-sm-6 col-md-12">
			<div class="col-md-3 col-sm-12 col-xs-12 ">
				<button type="submit" class="btn btn-info btn-lg" style="margin-left: 10px">
					<span class="glyphicon glyphicon-floppy-disk"> </span> Guardar</button>
			</div>
			{{-- <div class="col-md-6 col-md-12 col-xs-12 col-sm-6 col-md-12">
				<div class="col-md-3 col-sm-12 col-xs-12 ">
					<a class="btn btn-success btn-lg" href="{{ route('personagrupo-familiar.new',[$grupos->id]) }}"><span class="btn-label"> <i class="glyphicon glyphicon-user"></i></span> Nuevo Usuario</a>
				</div>
			</div> --}}
			<a class="btn btn-danger btn-close btn-lg" style="margin-left: 25px" href="{{ route('grupo-familiar-index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>
		</div>
	</div>

	

</div>

{!! Form::close() !!}
@endsection