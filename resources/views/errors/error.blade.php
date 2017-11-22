@if(count($errors))
	<div class="alert" style="background-color: #EC7063; color: white">
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>

		<ul>
			<h4>Errores:</h4>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif