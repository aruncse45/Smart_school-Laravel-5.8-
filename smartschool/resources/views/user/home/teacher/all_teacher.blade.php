@extends('user.master')

@section('maincontent')
<br>
	<h4 style="text-align: center;">ALL TEACHER</h4><br>
	@foreach($all_teacher as $p)
	<div class="a" style="text-align: center; float: left;">
		<a class="photo" href="{{url('/teacher/'.$p->Employee_id)}}">
			<img  src="{{URL::asset('admin/upload_image/'.$p->Image)}}">
		</a>
		<h4>{{$p->Name}}</h4>
		<h4>{{$p->Qualification}}</h4>
	</div>
	
	@endforeach
	

@endsection