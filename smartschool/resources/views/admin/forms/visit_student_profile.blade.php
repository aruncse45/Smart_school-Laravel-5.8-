@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">STUDENT INFO</h4><br><br>
<div style="text-align: center;"><marquee style="width: 30%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/view_student_profile', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
    <div class="form-group">
      <label for="inputEmail4">Student ID</label>
      <input type="text" class="form-control" id="inputPassword4" name="Student_id" placeholder="Class...." >
    </div>
    <div class="form-group">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." >
    </div>
    <div class="form-group">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......">
    </div>
    <div class="form-group">
      <label for="inputPassword4">Roll</label>
      <input type="text" class="form-control" id="inputPassword4" name="Roll" placeholder="Section......" >
    </div>

 
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button><br>

{!! Form::close() !!}
@endsection

