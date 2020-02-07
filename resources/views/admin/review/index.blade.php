@extends('admin.app')

@section('title')
Reviews
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('reviews.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Status</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($reviews as $review)			
			<tr>
				<td>
					@if(isset($review->image))
						<img src="{{ asset('/uploads/review/'.$review->image) }}" alt="{{ $review->name }}" width="100" height="100">
					@else
						<img src="/uploads/user.png" width="100" height="100">
					@endif
				</td>
				<td>{{ $review->name }} </td>
				<td>{{ $review->status && $review->status==1?'approved':'pending'}}</td>
				<td>{{ $review->created_at}}</td>
				<td class="text-right">			
				@if(!$review->status)		
					<a class="btn btn-success btn-sm" href="{{ route('reviews.approve', $review->id) }}"><i class="lnr lnr-checkmark-circle"></i></a>
					@else
					<a class="btn btn-danger btn-sm" href="{{ route('reviews.cancel', $review->id) }}"><i class="lnr lnr-cross-circle"></i></a>
					@endif
					<a class="btn btn-primary btn-sm" href="{{ route('reviews.edit', $review->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('reviews.destroy', $review->id) }}" method="post">
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