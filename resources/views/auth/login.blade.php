<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
   @section('htmlheader_title')
        Ingresar
   @endsection
    <link href="{{ asset('login.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

</head>

<body style="background-size: cover;">

<video autoplay="autoplay" id="video_background" preload="auto" style="
    min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  position: fixed;    
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%); 
  z-index: -100;
  background-size: cover;" />
  <source src="{{ asset('video/Keyboard.mp4') }}" type="video/mp4" />
</video/>

<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <div style="text-align: center; color: #2E4053"><h1><i class="fa fa-paw"></i> Censo Web</h1></div>
            <div class="x_panel" style="background-color: #EBEDEF">
                {!! Form::open(['url' => url('/login'), 'method' => 'post']) !!}
                <br>
                <div style="text-align: center;">
                    {!! Form::label('email', 'Correo Electrónico') !!}
                </div>
                {!! Form::email('email',null,['placeholder' =>'Correo Electrónico', 'class' => 'form-control']) !!}
            
                
                <div style="text-align: center;">
                    {!! Form::label('password','Contraseña') !!}
                </div>
                {!! Form::password('password',['class' => 'form-control','placeholder' => 'Contraseña']) !!}
                
                
                <div class="modal-footer">
                    <div class="pull-left">
                    <a href="{{ url('/register') }}" class="to_register"> Crear Cuenta </a>
                    {{-- <a class="reset_pass" href="{{  url('/password/reset') }}">Olvido su Password ?</a> --}}
                </div>
                <div class="pull-right">
                    {!! BootForm::submit('Ingresar', ['class' => 'btn btn-success submit ']) !!}
                </div>

                </div> 
                <div class="separator">
                    <div class="clearfix"></div>
                    <div style="text-align: right;">
                        
                        <p>Luis Gabriel Quirá Mazabuel</p>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</body>
</html>