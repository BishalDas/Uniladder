

<div class="form-group">
	<label class="col-sm-2 control-label" for="name">Name</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Name" name="name" value="{{ old('name', isset($contactinfo) ? $contactinfo->name : null) }}" type="text" id="name" >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="contact_person">Contact Person</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Contact Person" name="contact_person" value="{{ old('contact_person', isset($contactinfo) ? $contactinfo->contact_person : null) }}" type="text" id="contact_person" >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="Address">Address</label>
	<div class="col-sm-8">
		<textarea rows="5" class="form-control" placeholder="Address" name="address" id="address">{{ old('address', isset($contactinfo) ? $contactinfo->address : null) }}</textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="email">Email</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Email" name="email" value="{{ old('email', isset($contactinfo) ? $contactinfo->email : null) }}" type="email" id="email" >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="phone">Phone</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Phone" name="phone" value="{{ old('phone', isset($contactinfo) ? $contactinfo->phone : null) }}" type="text" id="phone" >
	</div>
</div>

