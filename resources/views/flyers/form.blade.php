{{ csrf_field() }}

<div class="form-group">
	<label for="street">
		Street:
	</label>
	<input 
	type="text" 
	name="street" 
	id="street" 
	class="form-control" 
	value="{{ old('street') }}" 
	placeholder="Street">
</div>

<div class="form-group">
	<label for="city">
		City:
	</label>
	<input 
	type="text" 
	name="city" 
	id="city" 
	class="form-control" 
	value="{{ old('city') }}"
	placeholder="City">
</div>

<div class="form-group">
	<label for="zip">
		Zip/Postal Code:
	</label>
	<input 
	type="text" 
	name="zip" 
	id="zip" 
	class="form-control" 
	value="{{ old('zip') }}" 
	placeholder="Zip">
</div>

<div class="form-group">
	<label for="country">
		Country:
	</label>
	<select 
	name="country" 
	id="country" 
	class="form-control" 
	>
	@foreach($countries as $country => $code)
		<option value="{{ $code }}">
			{{ $country }}
		</option>
	@endforeach
	</select>
</div>

<div class="form-group">
	<label for="state">
		State:
	</label>
	<input 
	type="text" 
	name="state" 
	id="state" 
	class="form-control" 
	value="{{ old('state') }}"
	placeholder="State">
</div>

<hr>

<div class="form-group">
	<label for="price">
		Sale Price:
	</label>
	<input 
	type="text" 
	name="price" 
	id="price" 
	class="form-control" 
	value="{{ old('price') }}"
	placeholder="Sale Price">
</div>

<div class="form-group">
	<label for="description">
		Description:
	</label>
	<textarea 
	name="description" 
	id="description" 
	class="form-control" 
	rows="10">{{ old('description') }}</textarea>
</div>

<div class="form-group">
	<button type="submit" class="btn btn-primary">Create Flyer</button>
</div>
