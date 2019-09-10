@extends('user.home.student.student_page_for_settings')

@section('maincontent')
    <br>
    {!! Form::open(['url' => '/change_username', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
    <div style="text-align: center;"><marquee style="width: 45%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}{{Session::get('msg1')}}</marquee></div>
    <h4 style="text-align: center;">Change Username</h4>
    <div class="form-group">
      <label for="exampleInputEmail1">Student ID</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Student_id" placeholder ="Your Student ID.." required required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Old username</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Old_username" placeholder ="your previous username..." required required>
    </div>
    <div class="form-group">
      <label for="exampleInputdiscription">New username</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="New_username" placeholder ="This will be your username..." required required>
    </div>
 
  <input type="hidden" name="Id" value="{{Session::get('id')}}">
  <button type="submit" class="btn btn-primary">Submit</button>

  {!! Form::close() !!}

  <br><br>
  
  
 {!! Form::open(['url' => '/change_password', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
  <h4 style="text-align: center;">Change Password</h4>
  <div class="form-group">
    <label for="exampleInputEmail1">Student ID</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Student_id" placeholder ="Student_id..." required>
  </div>

  <div class="form-group">
    <label for="exampleInputdiscription">Old password</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Old_password" placeholder ="Your previous password..." required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputdiscription">New password</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="This will be your password..." name="New_password" value="" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button><br><br>

{!! Form::close() !!}

@endsection