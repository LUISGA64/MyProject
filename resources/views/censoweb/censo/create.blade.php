@extends('layouts.blank')
@section('htmlheader_title')
Registro Grupo Familiar
@endsection

@section('main_container')

<div class="right_col" role="main">
  <div class=""></div>
  <!-- page content -->
  <div class="" role="main">
    {{-- Errores --}}
    @include('errors.error')
    {{-- Abrir Formulario --}}
    {!! Form::open(array('route'=>'censo.store', 'method'=>'POST','class'=>'form-horizontal')) !!}
    <div class="x_panel">
      <div class="x_title">
        {{-- Titulo del panel --}}
      </div>
      {{-- contenido del panel --}}
      <div class="x_content">
        <div class="row">{{-- PRIMER FILA DEL FORMULARIO --}}
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              {{-- Ficha familiar --}}
              {{-- <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback" >
                {!!Form::label('ficha', 'Número Ficha')!!}
                {!! Form::text('ficha', null, array('placeholder'=>'Número Ficha', 'class'=>'form-control has-feedback-left')) !!}
                <span class="fa fa-location-arrow form-control-feedback left" ></span>
              </div> --}}
              {{-- Direccion --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback" >
                {!!Form::label('direccion', 'Dirección')!!}
                {!! Form::text('direccion', null, array('placeholder'=>'Dirección', 'class'=>'form-control has-feedback-left', 'style' =>'color: #0B3861', old('direccion'))) !!}
                <span class="fa fa-location-arrow form-control-feedback left" ></span>
              </div>
              {{-- Tipo de Vivienda --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                {!!Form::label('tipo_vivienda', 'Tipo Vivienda')!!}
                {!! Form::select('tipo_vivienda', $tiposvivienda->pluck('tipo_vivienda','id'),null, ['class' => 'form-control','old'=>'tipo_vivienda','placeholder'=>'Tipo Vivienda..']) !!}
              </div>
              {{-- Zona --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                {!!Form::label('zona', 'Zona')!!}
                {!! Form::select('zona', ['Urbana'=>'Urbana','Rural'=>'Rural'],null,['class'=>'form-control','placeholder'=>'Zona..']) !!}
              </div>
            </div>
          </div>
        </div>
        {{-- Segunda Fila --}}
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"><strong>Actividad Economica</strong></legend>
              {{-- Actividad Economica --}}
              <div class="col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
                {!!Form::label('id_acteconomica', 'Actividad Económica')!!}
                {!! Form::select('id_acteconomica', $acteconom->pluck('actividad_economica','id'),null, ['class' => 'form-control','placeholder' => 'Actividad Económica..']) !!}
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
        </div>
        {{-- Tercera Fila del Formulario --}}
        <div class="Row">{{-- Inicio del 3 row --}}
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <legend class="legendStyle" style="margin-bottom: 1px; color: #26B99A"><strong>Material Vivienda</strong></legend>
            </div>
          </div>
          {{-- Material Techo --}}
          <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
            {!!Form::label('mat_techo', 'Material Techo')!!}
            {!! Form::select('mat_techo', $materialestecho->pluck('material_techo','id'),null, ['class' => 'form-control','placeholder' => 'Material Techo..']) !!}
          </div>
          {{-- Material Pisos --}}
          <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
            {!!Form::label('mat_piso', 'Material Pisos')!!}
            {!! Form::select('mat_piso', $materialespiso->pluck('material_piso','id'),null, ['class' => 'form-control','placeholder' => 'Material del Piso..']) !!}
          </div>
          {{-- Material Paredes --}}
          <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group">
            {!!Form::label('mat_paredes', 'Material Paredes')!!}
            {!! Form::select('mat_paredes', $materialparedes->pluck('material_pared','id'),null, ['class' => 'form-control','placeholder' => 'Material Paredes..']) !!}
          </div>
        </div>
        {{-- Cuarta Fila --}}
        <div class="row" id="row_3">{{-- inicio del 3 row --}}
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"><strong>Saneamiento Básico</strong></legend>
              {{-- Consumo Agua --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  <h5>{!!Form::label('consumoagua', 'Consumo Agua')!!}</h5>
                  {!! Form::select('consumoagua', $consumosagua->pluck('consumo_agua','id'),null, ['class' => 'form-control','placeholder' => 'Consumo Agua..']) !!}
                </div>
              </div>
              {{-- Aguas Servidas --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  <h5>{!!Form::label('aguaservidas', 'Aguas Servidas')!!}</h5>
                  {!! Form::select('aguaservidas', $aguaservidas->pluck('det_aguaservidas','id'),null, ['class' => 'form-control','placeholder' => 'Selecciona..']) !!}
                </div>
              </div>
              {{-- Eliminacion Excretas --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  <h5>{!!Form::label('excretas', 'Elimina Excretas')!!}</h5>
                  {!! Form::select('excreta', $excretas->pluck('eliminar_excretas','id'),null, ['class' => 'form-control','placeholder' => 'Selecciona..']) !!}
                </div>
              </div>
              {{-- Tipo Alumbrado --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  <h5>{!!Form::label('alumbrado', 'Tipo Alumbrado')!!}</h5>
                  {!! Form::select('alumbrado', $tiposalumbrado->pluck('tipo_alumbrado','id'),null, ['class' => 'form-control','placeholder' => 'Tipos de Alumbrado..']) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- Quinta Fila del Formulario --}}
        <div class="row" id="row_4">
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <legend class="legendStyle" style="margin-top: 1px; margin-bottom: 12px; margin-left: 5px; color: #26B99A"><strong>Riesgos Vivienda</strong></legend>
              {{-- Riesgos Vivienda --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  <h5>{!!Form::label('riesgovivienda', 'Riesgos Vivienda')!!}</h5>
                  {!! Form::select('riesgovivienda', $riesgos->pluck('riesgo','id'),null, ['class' => 'form-control','placeholder' => 'Riesgos Vivienda..']) !!}
                </div>
              </div>
              {{-- Vectores Vivienda --}}
              <div class="col-md-3 col-md-3 col-xs-12 col-sm-6 col-md-8 form-group has-feedback">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                  <h5>{!!Form::label('vectorvivienda', 'Vectores Vivienda')!!}</h5>
                  {!! Form::select('vectorvivienda', $vectores->pluck('vector_vivienda','id'),null, ['class' => 'form-control','placeholder' => 'Vector Vivienda..']) !!}
                </div>
              </div>
              {{--  --}}
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <button type="submit" class="btn btn-info" style="margin-left: 20px">
        <span class="glyphicon glyphicon-floppy-disk"> </span> Guardar</button>
        {{--  --}}
        <a class="btn btn-danger btn-close" href="{{ route('censo.index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>
          </div>
        </div>
      </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
  @endsection