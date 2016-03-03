@extends('layout')

@section('content')

<div class="row">
	
	<div class="col-md-6 col-md-offset-3">
		<table class="table table-hover">
			<thead></thead>
				<tr>
					<th>Zip Code</th>
					<th>Street</th>
				</tr>
			</thead>
			<tbody>
				@foreach($flyers as $flyer)
				<tr>
					<td>{{ $flyer->zip }}</td>
					<td>{{ $flyer->street }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection