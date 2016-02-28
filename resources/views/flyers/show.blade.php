@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-3">

			<h1>{!! $flyer->street !!} </h1>
			<h2>{!! $flyer->price !!}</h2>

			<hr>

			<div class="description">
				<p>
					{!! nl2br($flyer->description) !!}
				</p>
			</div>

		</div>

		<div class="col-md-9">
			@foreach($flyer->photos as $photo)
				<img src="/{{ $photo->path }}" alt="">
			@endforeach

		</div>

	</div>

	<hr>

	<form 
		action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
		method="POST"
		id="addPhotosForm"
		class="dropzone">
		{{ csrf_field() }}
		
	</form>

@stop

@section('scripts.footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

	<script type="text/javascript">
		Dropzone.options.addPhotosForm = {
			paramName: 'photo',
			maxFileSize: 3,
			acceptedFiles: '.jpg, .jpeg, .bmp, .png'
		}
	</script>
@stop