@extends('admin.app')

@section('title')
Settings
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('settings.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Value</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($settings as $setting)
			<tr>
				<td>{{ $setting->title }}</td>
				<td>{{ str_limit($setting->value, 70) }}</td>
				<td>{{ $setting->created_at->format('M d, Y') }}</td>
				<td class="text-right">
					
						<a class="btn btn-primary btn-sm" href="{{ route('settings.edit', $setting->id) }}"><i class="lnr lnr-pencil"></i></a>

						<div class="pull-right" style="margin-left: 10px;"> 
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('settings.destroy', $setting->id) }}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}		
								<button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
							</form>
						</div>
				</td>
			</tr>			
			@endforeach
		</tbody>
	</table>
</div>
@endsection