@extends('layouts.blank')


@section('main_container')


<div class="right_col" role="main">
	<div class="">
		{{--  --}}
		<form action="{{ route('entrust-gui::users.store') }}" method="post" role="form">
			@include('entrust-gui::users.partials.form')
			<button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>{{ trans('entrust-gui::button.create') }}</button>
			<a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('entrust-gui::button.cancel') }}</a>
		</form>
	</div>
</div>

@endsection