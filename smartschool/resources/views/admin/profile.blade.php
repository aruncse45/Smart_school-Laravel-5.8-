@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">ADMIN PROFILE</h4>
<br><br>
<div style="margin: 0 15%">
    Name : {{$profile->name}}<br>
    Email: {{$profile->email}}
</div>
@endsection