@extends('admin.app') 
@section('title') Pages
@endsection
 
@section('content')

<h3 class="page-title">Pages <a href="{{ route('pages.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> <span>Add New</span></a></h3>

<div class="panel">
	<div class="panel-heading">
		<form class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-3">
					<input type="text" class="form-control form-control-sm" name="keyword" placeholder="Keyword" value="{{ request()->keyword }}">
				</div>
				<div class="col-sm-2">
					{{-- <button type="submit" class="btn btn-primary"> Search </button> --}}
					<input type="submit" class="btn btn-primary" value="Search">
				</div>
				<label for="" class="col-sm-1 control-label">Filter</label>
				<div class="col-sm-3">
					<select name="filter" class="form-control" onchange="this.form.submit()">
						<option value="0">All</option>
						@foreach ($parents as $parent)
							@if ($parent->child()->count() > 0)
							<option {{ request()->filter == $parent->id ? 'selected=selected' : null }} value="{{ $parent->id }}">{{ $parent->title }}</option>							
							@endif
						@endforeach
						<option {{ request()->filter == 'top_menu' ? 'selected=selected' : null }} value="top_menu">Top Menu</option>
						<option {{ request()->filter == 'main_menu' ? 'selected=selected' : null }} value="main_menu">Main Menu</option>
						<option {{ request()->filter == 'footer' ? 'selected=selected' : null }} value="footer">Footer</option>
					</select>
				</div>

				@if(request()->filter || request()->keyword)
				<div class="col-sm-3">
					<a href="{{ route('pages.index') }}" class="btn btn-danger pull-right">Clear filter</a>
				</div>
				@endif

			</div>
		</form>
	</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Parent</th>
					<th>Title</th>
					<th>Url</th>
					<th>Status</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="sortable">
				@php $i=1; 
@endphp @foreach ($pages as $page)
				<tr id="{{ $page->id }}">
					<td>{{$i}}</td>
					<td>{{ $page->parent ? $page->parent->title : 'None' }}</td>
					<td>{{ str_limit($page->title,30) }}</td>
					<td>{{ $page->slug == '/' ? '/' : '/' . str_limit($page->slug,30) }}</td>
					<td>
						@if ($page->status)
							<a class="text-success" data-toggle="tooltip" data-placement="bottom" title="Click to hide" href="{{ route('pages.showhide', $page->id) }}">
								<i class="lnr lnr-checkmark-circle"></i>
								Active
							</a>
						@else
							<a class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Click to show" href="{{ route('pages.showhide', $page->id) }}">
								<i class="lnr lnr-cross-circle"></i>
								Draft
							</a>
						@endif 
					</td>
					<td>{{ $page->created_at->format('M d, Y') }}</td>
					<td class="text-right">

						<a class="btn btn-primary btn-sm" href="{{ route('pages.edit', $page->id) }}"><i class="fa fa-edit"></i></a>

						<div class="pull-right" style="margin-left: 10px;">
							<form onsubmit="return confirm('Are you sure?')" action="{{ route('pages.destroy', $page->id) }}" method="post">
								{{ method_field('DELETE') }} {{ csrf_field() }}
								<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
							</form>
						</div>
					</td>
				</tr>
				@php $i++; 
@endphp @endforeach
			</tbody>
		</table>
	</div>
	<div class="panel-footer">{{ $pages->links() }}</div>
</div>
@endsection

 
@section('script') @if(request()->filter)
<script>
	$( function() {
		$( "#sortable" ).sortable({
			update: function (event, ui) {
				var data = $(this).sortable('toArray');
				url = "{{ route('pages.order') }}";
				$.ajax(url, {
					data: {
						'_token': "{{ csrf_token() }}",
						'order': "{{ request()->filter?:'order_by' }}",
						'data':data
					},
					type: 'POST',
				});
			}
		});
	} );

</script>
@endif
@endsection