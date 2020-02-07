@extends('admin.app')

@section('title')
Slides
@endsection

@section('content')

<h3 class="page-title">Slides <a href="{{ route('slides.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>

<div class="panel">
	<div class="panel-body">		
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Slide</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="sortable">
			@foreach ($slides as $slide)			

			<tr id="{{ $slide->id }}">
				<td><img src="{{ $slide->image() }}" width="100"></td>
				<td>{{ $slide->title }}</td>
				<td>
					@if ($slide->status)
						<a class="text-success" data-toggle="tooltip" data-placement="bottom" title="Click to hide" href="{{ route('slides.showhide', $slide->id) }}">
							<i class="lnr lnr-checkmark-circle"></i>
							Active
						</a>
					@else
						<a class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Click to show" href="{{ route('slides.showhide', $slide->id) }}">
							<i class="lnr lnr-cross-circle"></i>
							Draft
						</a>
					@endif 
				</td>
				<td>{{ $slide->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('slides.edit', $slide->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('slides.destroy', $slide->id) }}" method="post">
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

@section('script')
<script>
	$( function() {
		$( "#sortable" ).sortable({
			update: function (event, ui) {
				var data = $(this).sortable('toArray');
				url = "{{ route('slides.order') }}";
				$.ajax(url, {
					data: {
						'_token': "{{ csrf_token() }}",
						'data':data
					},
					type: 'POST',
				});
			}
		});
	} );

</script>
@endsection

