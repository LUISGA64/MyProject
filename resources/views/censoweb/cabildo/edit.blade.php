@extends('layouts.blank')

@section('htmlheader_title')
  Editar Integrante
@endsection

@section('main_container')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				{{-- <h3>Cargos Cabildo</h3> --}}
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel" style="background-color: #E8E8EC">
					<div class="x_title">
						<h2>{{ $resg->resguardo }} <small>- Cargos </small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						{!! Form::model($integrantes, ['method'=>'PUT', 'route'=>['cabildo.update',$integrantes], 'class'=>'form-horizontal']) !!}

							<div class="form-group">
								{!! Form::label('integrante', 'Integrante', ['class'=>"control-label col-md-3 col-sm-3 col-xs-12"]) !!}
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									{!! Form::text('integrante', null,array('class'=>'form-control col-md-7 col-xs-12')) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('identificacion', 'Identificación', ['class'=>"control-label col-md-3 col-sm-3 col-xs-12"]) !!}
								<div class="col-md-6 col-sm-6 col-xs-12">
									{!! Form::text('identificacion', null,array('class'=>'form-control col-md-7 col-xs-12')) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('tipodocs', 'Tipo Documento', ['class'=>"control-label col-md-3 col-sm-3 col-xs-12"]) !!}
								<div class="col-md-6 col-sm-9 col-xs-12">
									<select select name="tipodocs" id="tipodoc" class="form-control">
										@foreach ($tipodocs as $tipodoc)
											@if ($integrantes->tipodoc_id == $tipodoc->tipodocs_id)
												<option value="{{ $tipodoc->tipodocs_id }}" selected>{{ $tipodoc->tipo_documento }}</option>
											@else
											    <option value="{{ $tipodoc->tipodocs_id }}">{{ $tipodoc->tipo_documento }}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('cargo', 'Cargo Asignado', ['class'=>"control-label col-md-3 col-sm-3 col-xs-12"]) !!}
								<div class="col-md-6 col-sm-9 col-xs-12">
									<select select name="cargo" id="cargo" class="form-control">
										@foreach ($cargos as $cargo)
											@if ($integrantes->cargo_id == $cargo->cargo_id)
												<option value="{{ $cargo->cargo_id }}" selected>{{ $cargo->cargo }}</option>
											@else
												<option value="{{ $cargo->cargo_id }}">{{ $cargo->cargo }}</option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-12 col-xs-12">Inicia Vigencia <span class="required">*</span>
								</label>
								 <div class="col-md-6 col-sm-12 col-xs-12">
									<select name="vigencia" id="vigencia" class="form-control">
									<option value="">Año Vigencia</option>
									<option>{{Carbon\Carbon::now()->year}}</option>
								</select>
								</div>

							</div>


							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"> </span> Guardar</button>
									<a class="btn btn-danger btn-close" href="{{ route('cabildo.index') }}"><span> <i class="fa fa-close"> Cancelar</i></span></a>
									{{-- <button class="btn btn-default" type="reset">Borrar</button> --}}

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