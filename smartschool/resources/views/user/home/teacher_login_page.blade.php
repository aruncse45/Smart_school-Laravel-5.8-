@extends('user.master')

@section('maincontent')
<br><br>
<h3 style="text-align: center;">TEACHER/STUFF LOGIN</h3>
<br>
{!! Form::open(['url' => '/teacher_login', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
 <div style="text-align: center;"><marquee style="width: 20%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div> 
<div align="center">
    <div class="form-group" style="width: 50%">
      <label for="inputEmail4">Employee ID</label>
      <input type="text" class="form-control" id="inputPassword4" name="Employee_id" placeholder="your Employee id..." required>
    </div>
    <div class="form-group" style="width: 50%">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="Password" placeholder="Your password....." required>
    </div>
  <button type="submit" class="btn btn-success ">Submit</button><br><br>
</div>

{!! Form::close() !!}
@endsection
