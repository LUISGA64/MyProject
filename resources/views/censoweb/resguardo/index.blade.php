@extends('layouts.blank')

@foreach($resg as $r)
@section('htmlheader_title')
{{ $r->resguardo }}
@stop

@section('main_container')
<div class="right_col" role="main">
	<div class="">
		<div class="x_panel">
			<div class="x_title">
				<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							{{-- Sección Botón Izquierda --}}
							<div class="pull-left">
								
								<a class="btn btn-warning" style="margin-bottom: 5px; margin-top: 10px; " href="{{ route('resguardo-edit',$r->id) }}"><span class="btn-label"> <i class="fa fa-pencil" style="color: #FDFEFE "></i></span> Editar Resguardo</a>
								
							</div>
							{{-- Botón Derecha --}}
							<div class="pull-right">
								@permission('crear-grupo-familiar')
								<a class="btn btn-success" style="margin-bottom: 5px; margin-top: 10px; background-color: #3EB2AB" href="{{ route('resguardo-create') }}"><span class="btn-label"> <i class="fa fa-university" style="color: #FDFEFE "></i></span> Crear Resguardo</a>
								@endpermission
							</div>
						</div>
					</div>
			</div>
			{{-- Contenido del Panel --}}
			
			<div class="row">
				<!-- form input mask -->
				<div class="x_content" style="margin-top: 0px">
					{{-- panel 1 --}}
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="x_panel" style="border: none; margin-top: 0px" >
							<div class="x_title" style="border: none"></div>
							<div class="x_content">
								<form class="form-horizontal form-label-left">
									<div class="row" style="margin-top: 1px">
										{{--  --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Resguardo:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $r->resguardo }}</strong></h4>
										</div>
										{{-- Identificación --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Nit:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $r->identificacion }}</strong></h4>
										</div>
										{{-- Pueble --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Pueblo:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $r->pueblo }}</strong></h4>
										</div>
										{{-- Identificación --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Resolución:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $r->resolucion }}</strong></h4>
										</div>
										{{-- direccion_resguardo --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Dirección:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $r->direccion_resg }}</strong></h4>
										</div>
										{{-- email-resguardo --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Correo Electrónico:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $r->email_resg }}</strong></h4>
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>
					{{-- panel-2 --}}
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="x_panel" style="border: none ">
							<div class="x_title" style="border: none"></div>
							<div class="x_content">
								{!! Form::label('logo','Logo Resaguardo',['style' => 'margin: auto']) !!}
								<div class="thumbnail" style="height: 50%; background-color: #F2F3F4 ">
									<img style="display: block; margin: auto; width: 300px; height: 300px" src="web/{{ $r->logo_resg }}" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>

@endsection