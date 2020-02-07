@extends('admin.app')

@section('title')
Contact Info
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('contactinfos.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>SN</th>
				<th>Name</th>
				<th>Contact Person</th>
				<th>Address</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Created At</th>
			</tr>
		</thead>
		<tbody>
		<?php $i=1; ?>
			@foreach ($contactinfos as $contactinfo)
			<tr>
				<td>{{$i}}</td>
				<td>{{ $contactinfo->name }}</td>
				<td>{{$contactinfo->contact_person}}</td>
				<td>{{ $contactinfo->address }}</td>
				<td>{{ $contactinfo->email }}</td>
				<td>{{$contactinfo->phone}}</td>
				<td>{{ $contactinfo->created_at->format('M d, Y') }}</td>
				<td class="text-right">
					
						<a class="btn btn-primary btn-sm" href="{{ route('contactinfos.edit', $contactinfo->id) }}"><i class="lnr lnr-pencil"></i></a>

						<div class="pull-right" style="margin-left: 10px;"> 
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('contactinfos.destroy', $contactinfo->id) }}" method="post">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}		
								<button type="submit" class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
							</form>
						</div>
				</td>
			</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
</div>
@endsection