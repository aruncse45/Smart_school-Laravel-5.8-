@extends('user.home.teacher.teacher_page_for_settings')

@section('maincontent')
     <div style="text-align: center;"><marquee style="width: 30%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">

     {{Session::get('msg')}}{{Session::get('msg1')}}</marquee></div>
    {!! Form::open(['url' => '/change_teacher_username', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
    <br>
    <h4>Change Username</h4>
    <div class="form-group">
      <label for="exampleInputEmail1">Teacher ID</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Employee_id" placeholder ="Teacher ID...." required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Old username</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Old_username" placeholder ="Your previous username.." required>
    </div>
    <div class="form-group">
      <label for="exampleInputdiscription">New username</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="New_username" placeholder ="This will be your username..." required>
    </div>
 
  <input type="hidden" name="Id" value="{{Session::get('id')}}">
  <button type="submit" class="btn btn-primary">Submit</button>

  {!! Form::close() !!}

  <br><br>
  
  <h4>Change Password</h4>
 {!! Form::open(['url' => '/change_teacher_password', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}

  <div class="form-group">
    <label for="exampleInputEmail1">Teacher ID</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Employee_id" placeholder ="Teacher ID..." required>
  </div>

  <div class="form-group">
    <label for="exampleInputdiscription">Old password</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Old_password" placeholder ="Your previous password..." required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputdiscription">New password</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="This will be your password..." name="New_password" value="" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <br><br>

{!! Form::close() !!}

@endsection