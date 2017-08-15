<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
   @section('htmlheader_title')
		Login
   @endsection
    
    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

</head>

<body class="login" >
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
				{!! BootForm::open(['url' => url('/login'), 'method' => 'post']) !!}
                    
				<h1>Acceso CensoWeb</h1>
			
				{!! BootForm::email('email', 'Email', old('email'), ['placeholder' => 'Email', 'afterInput' => '<span>test</span>'] ) !!}
			
				{!! BootForm::password('password', 'Password', ['placeholder' => 'Password']) !!}
				
				<div>
					{!! BootForm::submit('Log in', ['class' => 'btn btn-success submit ']) !!}
					<a class="reset_pass" href="{{  url('/password/reset') }}">Olvido su Password ?</a>
				</div>
                    
				<div class="clearfix"></div>
                    
				<div class="separator">
					<p class="change_link">
						<a href="{{ url('/register') }}" class="to_register"> Crear Cuenta </a>
					</p>
                        
					<div class="clearfix"></div>
					<br />
                        
					<div>
						<h1><i class="fa fa-paw"></i> Censo Web</h1>
						<p>©2016 Derechos Reservados. Luis Gabriel Quirá Mazabuel. Terminos y Condiciones</p>
					</div>
				</div>
				{!! BootForm::close() !!}
            </section>
        </div>
    </div>
</div>
</body>
</html>