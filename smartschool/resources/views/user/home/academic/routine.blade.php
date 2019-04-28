@extends('user.master')

@section('maincontent')
<h4 id="e" style="text-align: center;">ROUTINE</h4><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/show_routine', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
<div align="center">
    <div class="form-group" style="width: 50%">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." required>
    </div>
    <div class="form-group" style="width: 50%">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>
     <div class="form-group" style="width: 50%">
      <label for="inputPassword4">Section (If exist)</label>
      <input type="text" class="form-control" id="inputPassword4" name="Section" placeholder="Session......" >
    </div>
  <button type="submit" class="btn btn-success ">Submit</button><br><br>
</div>
{!! Form::close() !!}
@endsection

