@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('htmlheader_title')
	Editar Resguardo
@endsection

@section('main_container')
	<div class="right_col" role="main">

    <div class="">

		@include('errors.error')

    
    {!! Form::open(['route' => ['resguardo-update', $resg], 'method' => 'PUT']) !!}
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <ul class="nav navbar-right panel_toolbox">
            {{-- <li><a class="link" a href="{{ route('resguardo-index') }}"><i class="fa fa-reply-all" style="color: #337ab7"></i></a></li> --}}
            {{-- <li><a class="collapse-link"><i class="fa fa-chevron-up" style="color: #26B99A"></i></a></li> --}}
            
          </ul>
          <div class="clearfix"></div> 
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
              <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                {{-- Resguardo --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('resguardo', 'Resguardo')!!}
                  {!! Form::text('resguardo', $resg->resguardo, array('class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-cube form-control-feedback left" ></span>
                </div>
                {{-- identificacion Resguardo --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('identResguardo', 'Identificación Resguardo')!!}
                  {!! Form::text('identResguardo', $resg->identificacion, array('placeholder'=>'Identificación Resguardo', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-tasks form-control-feedback left" ></span>
                </div>
                {{-- Pueblo --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('pueblo', 'Pueblo Indígena')!!}
                  {!! Form::text('pueblo', $resg->pueblo, array('placeholder'=>'Pueblo Indígena', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-thumb-tack form-control-feedback left" ></span>
                </div>
                {{-- Resolucion --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('resolucion', 'Resolución')!!}
                  {!! Form::text('resolucion', $resg->resolucion, array('placeholder'=>'Resolución', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-th-large form-control-feedback left" ></span>
                </div>
                {{-- Direccion --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('direccion_resg', 'Dirección')!!}
                  {!! Form::text('direccion_resg', $resg->direccion_resg, array('placeholder'=>'Dirección', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-street-view form-control-feedback left" ></span>
                </div>
                {{-- Jurisdiccion --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('jurisdiccion', 'Jurisdicción')!!}
                  {!! Form::text('jurisdiccion', $resg->jurisdiccion, array('placeholder'=>'Jurisdicción', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- Email --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('email', 'Correo Electrónico')!!}
                  {!! Form::email('email', $resg->email_resg, array('class' => 'form-control has-feedback-left')) !!}
                  <span class="fa fa-envelope-o form-control-feedback left" ></span>
                </div>
                {{-- logo --}}
                <div class="row">
                	<div class="col-md-6">
                		<div class="col-md-12 col-xs-12 col-sm-12 form-group has-feedback">
                			{!!Form::label('logo', 'Logo')!!} <p style="color: #F1948A">Imagen en Formato .PNG</p>
                			{!! Form::file('logo',['style'=>"font-size: 15px"]) !!}
                		</div>
                	</div>
                	<div class="col-md-6">
                		<div class="col-md-2 column productbox" style="padding: 2px; background-color: #B2BABB">
                			<img src="/img/DocResaguardo/{{ $resg->logo_resg }}" style="display: block; margin: auto; width: 75px; height: 95px" />
                		</div>
                	</div>
                </div>
                {{--  --}}
                <div class="row" style="text-align: right;">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"> </span> Guardar</button>
                  {{--  --}}
                    <a class="btn btn-danger btn-close" href="{{ route('resguardo-index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection