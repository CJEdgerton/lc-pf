@extends('layout')

@section('content')

	<div class="row">

		<div class="col-md-4">

			<h1>{!! $flyer->street !!} </h1>
			<h2>{!! $flyer->price !!}</h2>

			<hr>

			<div class="description">
				<p>
					{!! nl2br($flyer->description) !!}
				</p>
			</div>

		</div>

		<div class="col-md-8 gallery">
			@foreach($flyer->photos->chunk(4) as $set)
				<div class="row">
					@foreach($set as $photo)
						<div class="col-md-3 gallery__image">
							<a href="/{{ $photo->path }}" data-featherlight>
								<img src="/{{ $photo->thumbnail_path }}" alt="">
							</a>
						</div>
					@endforeach
				</div>
			@endforeach

		</div>

	</div>

	@if($user && $user->owns($flyer))
		<hr>

		<form 
			action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
			method="POST"
			id="addPhotosForm"
			class="dropzone">
			{{ csrf_field() }}
			
		</form>
	@endif

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