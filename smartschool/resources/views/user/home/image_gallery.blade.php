@extends('user.master')

@section('maincontent')
<br>
	<h4 style="text-align: center;">IMAGE GALLERY</h4><br>
	@foreach($images as $image)
	<a class="photo" href="{{URL::asset('admin/upload_image/'.$image->image)}}">
		<img  src="{{URL::asset('admin/upload_image/'.$image->image)}}">

	</a>
	@endforeach
	

@endsection