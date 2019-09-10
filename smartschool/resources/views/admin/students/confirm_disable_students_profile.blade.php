@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">CONFIRM DISABLE STUDENT'S FORM</h4><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/confirm_disable_students_form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div style="margin-left: 30%; " class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Student ID</label>
      <input type="text" class="form-control" id="inputPassword4" name="Student_id" placeholder="Set student id.." required>
    </div><br>
    <div class="form-group col-md-8">
      <label for="inputPassword4"></label>
      Confirm : &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox"  name="Confirm" required>
    </div>
    <input type="hidden" name="id" value="{{$id->id}}">
    
    <div align="center" class="form-group col-md-6">
     <button type="submit" class="btn btn-primary">SUBMIT</button>
    </div>
</div>
  {!! Form::close() !!}
@endsection