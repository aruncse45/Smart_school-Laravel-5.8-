@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">ROUTINE</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/save_routine', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  

    <div class="form-group">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." required>
    </div>
    <div class="form-group">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>
    <div class="form-group">
      <label for="inputPassword4">Section</label>
      <input type="text" class="form-control" id="inputPassword4" name="Section" placeholder="Section......">
    </div>
    <div class="form-group">
      <label for="inputEmail4">Routine (pdf file)</label>
      <input type="file" class="form-control" id="Image" name="Routine" placeholder="" required>
    </div>

  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>

{!! Form::close() !!}
@endsection

