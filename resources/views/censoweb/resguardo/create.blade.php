@extends('layouts.blank')

@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('htmlheader_title')
  Nuevo Resguardo
@endsection

@section('main_container')
<div class="right_col" role="main">

  <div class="">
    <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 margin-tb">
        <div class="pull-left">
          {{-- prueba --}}
        </div>

        <div class="pull-right">
          {{-- prueba --}}
        </div>

      </div>
    </div>

    @include('errors.error')


    {!! Form::open(array('route'=>'resguardo-store', 'method'=>'POST','files'=>true,'class'=>'form-horizontal')) !!}
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
                  {!! Form::text('resguardo', null, array('placeholder'=>'Resguardo', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- identificacion Resguardo --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('identResguardo', 'Identificación Resguardo')!!}
                  {!! Form::text('identResguardo', null, array('placeholder'=>'Identificación Resguardo', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- Pueblo --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('pueblo', 'Pueblo Indígena')!!}
                  {!! Form::text('pueblo', null, array('placeholder'=>'Pueblo Indígena', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- Resolucion --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('resolucion', 'Resolución')!!}
                  {!! Form::text('resolucion', null, array('placeholder'=>'Resolución', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- Direccion --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('direccion_resg', 'Dirección')!!}
                  {!! Form::text('direccion_resg', null, array('placeholder'=>'Dirección', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- Jurisdiccion --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('jurisdiccion', 'Jurisdicción')!!}
                  {!! Form::text('jurisdiccion', null, array('placeholder'=>'Jurisdicción', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- Email --}}
                <div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
                  {!!Form::label('email', 'Correo Electrónico')!!}
                  {!! Form::email('email', null, array('placeholder'=>'resguardoIndigena@email.com', 'class'=>'form-control has-feedback-left')) !!}
                  <span class="fa fa-location-arrow form-control-feedback left" ></span>
                </div>
                {{-- logo --}}
                <div class="col-md-12 col-xs-12 col-sm-12 form-group has-feedback">
                  {!!Form::label('logo', 'Logo')!!} <p style="color: #F1948A">Imagen en Formato .PNG</p>
                  {!! Form::file('logo',['style'=>"font-size: 15px"]) !!}
                </div>
                {{--  --}}
                <div class="row" style="text-align: right;">
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-floppy-disk"> </span> Guardar</button>
                  {{--  --}}
                    <a class="btn btn-danger btn-close btn-lg" href="{{ route('resguardo-index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>
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