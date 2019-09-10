@extends('user.master')

@section('maincontent')
<br>
	<h4 style="text-align: center;">ALL COMMITTE</h4><br>
	@foreach($all_committe as $p)
	<div  class="photo" style="text-align: center; float: left;">
		
		<img  src="{{URL::asset('admin/upload_image/'.$p->Image)}}">
	
		<h4>{{$p->Name}}</h4>
		<h4>{{$p->Designation}}</h4>
		<h4>{{$p->Address}}</h4>
	</div>
	
	@endforeach
	

@endsection