@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Selling Your Home?</h1>
		<div class="row">
			<form 
			type="multipart/form-data" 
			method="POST" 
			action="{{ route('flyers.store') }}"
			class="">

				@include('flyers.form')

				@include('errors')

			</form>
		</div>
	</div>
</div>
@endsection