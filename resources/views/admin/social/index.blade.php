@extends('admin.app')

@section('title')
Socials
@endsection

@section('content')

<h3 class="page-title">Socials <a href="{{ route('socials.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>

<div class="panel">
	<div class="panel-body">		
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Link</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($socials as $social)			
			<tr>
				<td>{{ $social->title }}</td>
				<td>{{ $social->link }}</td>
				<td>{{ $social->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('socials.edit', $social->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('socials.destroy', $social->id) }}" method="post">
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

