@extends('user.master')

@section('maincontent')
<br>
<h3 style="margin: 0 35%">ATTENDENCE INFORMATION</h3><br>
 <div style="text-align: center;"><marquee style="width: 20%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/attendence_info', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Section</label>
      <input type="text" class="form-control" id="inputPassword4" name="Section" placeholder="Class...." >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>
   <div class="form-group col-md-6">
      <label for="inputEmail4">Date</label>
      <input type="Date" class="form-control" id="inputEmail4"  name="Date" required>
    </div>
  </div>
  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
  <br><br>

{!! Form::close() !!}
@endsection

