@extends('admin.app')

@section('title')
Admins
@endsection

@section('content')

<h3 class="page-title">Admins <a href="{{ route('admins.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>

<div class="panel">
	<div class="panel-body">		
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($admins as $admin)			
			<tr>
				<td>{{ $admin->name }}</td>
				<td>{{ $admin->email }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('admins.edit', $admin->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('admins.destroy', $admin->id) }}" method="post">
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
</div>
@endsection

