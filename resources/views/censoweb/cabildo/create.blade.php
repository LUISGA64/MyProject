@extends('layouts.blank')

@section('htmlheader_title')
  Cargos Cabildo
@endsection

@section('main_container')
<!-- page content -->
<div class="right_col" role="main">
	@include('errors.error')
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
						<br />
						{!! Form::open(array('route'=>'cabildo.store', 'method'=>'POST', 'class'=>'form-horizontal')) !!}

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="integrante">Nombres y Apellidos <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="i" name="integrante" placeholder="Integrante" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="identificacion">Identificación <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="identificacion" name="identificacion" placeholder="Identificación" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Documento<span class="required">*</span></label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<select select name="tipodocs" id="tipodocs" class="form-control">
										<option>Tipo Documento</option>
										@foreach ($tipodocs as $tipodoc)
										<option value="{{ $tipodoc['tipodocs_id'] }}">{{ $tipodoc['tipo_documento'] }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo Designado<span class="required">*</span></label>
								<div class="col-md-6 col-sm-9 col-xs-12">
									<select select name="cargo" id="cargo" class="form-control">
										<option>Cargo Asignado</option>
										@foreach ($cargos as $cargo)
										<option value="{{ $cargo['cargo_id'] }}">{{ $cargo['cargo'] }}</option>
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
