@extends('admin.app')

@section('title')
	Wallpaper
@endsection

@section('content')

<div class="add-new">
	<a href="{{ route('wallpapers.create') }}" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Add New</span></a>
</div>

<div class="content-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Page</th>
				<th>Wallpaperid</th>
				<th>Caption</th>
				<th>Created At</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($wallpapers as $wallpaper)
			<tr>
				<td><img src="{{ asset('public/uploads/wallpaper/' . $wallpaper->wallpaper) }}" alt="{{ $wallpaper->wallpaper_caption }}" width="80"></td>

				<td>{{ $wallpaper->page }}</td>
				<td>{{ $wallpaper->wallpaperid }}</td>
				<td>{{ $wallpaper->wallpaper_caption }}</td>
				<td>{{ $wallpaper->created_at->format('M d, Y') }}</td>
				<td class="text-right">					
					<a class="btn btn-primary btn-sm" href="{{ route('wallpapers.edit', $wallpaper->id) }}"><i class="lnr lnr-pencil"></i></a>
					<div class="pull-right" style="margin-left: 10px;"> 
						<form onsubmit="return confirm('Are you sure?')" action="{{ route('wallpapers.destroy', $wallpaper->id) }}" method="post">
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