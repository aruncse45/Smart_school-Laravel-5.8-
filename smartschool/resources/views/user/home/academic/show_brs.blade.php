@extends('user.master')

@section('maincontent')
<h4 id="e" style="text-align: center;">ROUTINE BOOLIST SYLLABUS</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>

<div align="center">
<object data="{{URL::asset('admin/upload_pdf/'.$result->Pdf)}}" type="application/pdf" width="70%" height="500px">
<a href="{{URL::asset('admin/upload_pdf/'.$result->Pdf)}}">test.pdf</a>
</object>
</div><br>
@endsection

