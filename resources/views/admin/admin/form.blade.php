<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Name</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Name" name="name" value="{{ old('name', isset($admin) ? $admin->name : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="icon">Email</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Email" name="email" value="{{ old('email', isset($admin) ? $admin->email : null) }}" type="text" id="icon">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="link">Password</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Password" name="password" value="{{ old('password') }}" type="text" id="link">
	</div>
</div>