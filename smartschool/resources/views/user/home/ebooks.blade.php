@extends('user.master')

@section('maincontent')
<br>
	<h4 style="text-align: center;">EBOOKS</h4><br>
	<div style="height: 100px; margin: 0 10%; color: blue">
		@foreach($ebooks as $ebook)
		Name : {{$ebook->Name}}<br>
		<a href="{{URL::asset('admin/upload_pdf/'.$ebook->Ebook)}}">Click here for view</a> <br><br>
	@endforeach
	</div>
	

@endsection