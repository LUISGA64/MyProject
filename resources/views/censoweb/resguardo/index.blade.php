@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('htmlheader_title')
{{ $resg->resguardo }}
@endsection

@section('main_container')
<div class="right_col" role="main">
	<div class="">
		<div class="x_panel">
			<div class="x_title">
				<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							{{-- Sección Botón Izquierda --}}
							<div class="pull-left">
								
								<a class="btn btn-warning" style="margin-bottom: 5px; margin-top: 10px; " href="{{ route('resguardo-edit',$resg->id) }}"><span class="btn-label"> <i class="fa fa-pencil" style="color: #FDFEFE "></i></span> Editar Resguardo</a>
								
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
											<h4><strong>{{ $resg->resguardo }}</strong></h4>
										</div>
										{{-- Identificación --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Nit:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $resg->identificacion }}</strong></h4>
										</div>
										{{-- Pueble --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Pueblo:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $resg->pueblo }}</strong></h4>
										</div>
										{{-- Identificación --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Resolución:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $resg->resolucion }}</strong></h4>
										</div>
										{{-- direccion_resguardo --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Dirección:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $resg->direccion_resg }}</strong></h4>
										</div>
										{{-- email-resguardo --}}
										<div class="col-xs-12 col-sm-12 col-md-12 form-group has-feedback" >
											{!!Form::label('resguardo', 'Correo Electrónico:',['style'=>"color: #3EB2AB"])!!}<br>
											<h4><strong>{{ $resg->email_resg }}</strong></h4>
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
								<form class="form-horizontal form-label-left">
									<div class="col-md-6" style="text-align: center; ">
										<div class="thumbnail" style="height: 100%; background-color: #F2F3F4 ">
											<div class="image view view-first" style="height: 100%; ">
												<img style="display: block; margin: auto;" src="/img/DocResaguardo/{{ $resg->logo_resg }}" />
												<div class="mask" style="background-color: #5D6D7E">
													<p style="text-align: center; color: #FBFCFC	; font-size: 18px" >Logo Resguardo</p>
												</div>
											</div>
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
@endsection