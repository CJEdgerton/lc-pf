@extends('layout')

@section('content')
	<h1>Selling Your Home?</h1>

		<form 
			type="multipart/form-data" 
			method="POST" 
			action="{{ route('flyers.store') }}"
			class="col-md-6">

			@include('flyers.form')

			@include('errors')

		</form>
@endsection