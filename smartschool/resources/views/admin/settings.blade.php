@extends('admin.adminpage')

@section('maincontent')

  {!! Form::open(['url' => '/change_admin_username', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
    <br>
    <div style="text-align: center;"><marquee style="width: 45%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}{{Session::get('msg1')}}{{Session::get('msg2')}}</marquee></div>
    
    <h5 style="text-align: center; ">Change Username</h5>
    
    
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="Email" placeholder ="Admin email...." required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Old username</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="Old_username" placeholder ="Your current username..." required>
    </div>
    <div class="form-group">
      <label for="exampleInputdiscription">New username</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="New_username" placeholder ="This will be your next username..." required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  {!! Form::close() !!}

  <br><br>
  
  
  {!! Form::open(['url' => '/change_admin_password', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
    <h5 style="text-align: center;">Change Password</h5>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="Email" placeholder ="Admin email...." required>
    </div>

    <div class="form-group">
      <label for="exampleInputdiscription">Old password</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="Old_password" placeholder ="Your current password..." required>
    </div>
  
    <div class="form-group">
      <label for="exampleInputdiscription">New password</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="This will be your next password.." name="New_password" value="" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  {!! Form::close() !!}

  <br><br>

  {!! Form::open(['url' => '/change_admin_email', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}

    <h5 style="text-align: center;">Change Email</h5>
    <div class="form-group">
      <label for="exampleInputEmail1">Old Email</label>
      <input type="email" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="Email" placeholder ="Admin current email...." required>
    </div>
    <div class="form-group">
      <label for="exampleInputdiscription">New Email</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" name="New_email" placeholder ="This will be your next email..." required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button><br><br>

  {!! Form::close() !!}
@endsection