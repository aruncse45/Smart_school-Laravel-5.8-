@extends('admin.adminpage')

@section('maincontent')
	<h4 id="e">Select  image for Homepage</h4><br><br>
	@foreach ($images as $image)

		{!! Form::open(['url' => '/select_images', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

		<input type="checkbox" name="{{$image->id}}" value="select">
		<img style="height: 200px; width: 200px" src="{{URL::asset('admin/upload_image/'.$image->image)}}"> <br><br>
	@endforeach
	  	<button style=" margin: auto; width: 15%" type="submit" class="btn btn-primary">SET</button><br><br>
	  	<br>
	{!! Form::close() !!}
@endsection