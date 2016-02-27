@extends('layout')

@section('content')
	<h1>Selling Your Home?</h1>

	<div class="row">
		<form 
			type="multipart/form-data" 
			method="POST" 
			action="/flyers"
			class="col-md-6">

			@include('flyers.form')

		</form>
	</div>
@endsection