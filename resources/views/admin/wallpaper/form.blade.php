
@if (!isset($wallpaper))
<div class="form-group">
	<label class="col-sm-2 control-label" for="page">Page</label>
	<div class="col-sm-3">
		<select class="form-control" name="page" id="page">
			<option value="">Select Page</option>
			@foreach ($pages as $page)
				<option value="{{ $page }}">{{ $page }}</option>
			@endforeach
		</select>
	</div>
</div>
@endif
<div class="form-group">
	<label class="col-sm-2 control-label" for="wallpaperid">Wallpaper Id</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Wallpaper Id" name="wallpaperid" value="{{ old('wallapaperid', isset($wallpaper) ? $wallpaper->wallpaperid : null) }}" type="text" id="wallpaperid" {{ isset($wallpaper) ? 'readonly="readonly"' : null }}>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="wallpaper">Image</label>
	<div class="col-sm-10">
		<input type="file" name="wallpaper" id="wallpaper">
		{{-- Image size: 900X400px --}}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="wallpaper_caption">Image Caption</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Wallpaper Caption" name="wallpaper_caption" id="wallpaper_caption">{{ old('wallpaper_caption', isset($wallpaper) ? $wallpaper->wallpaper_caption : null) }}</textarea>
	</div>
</div>