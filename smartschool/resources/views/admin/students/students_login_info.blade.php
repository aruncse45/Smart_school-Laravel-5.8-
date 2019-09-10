@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">STUDENT's LOGIN INFO</h4><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/students_login_info_form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div style="margin: ; " class="form-row">
     <div class="form-group col-md-3">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." >
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputPassword4">Section</label>
      <input type="text" class="form-control" id="inputPassword4" name="Section" placeholder="Section......" >
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="Image" name="Name" placeholder="" >
    </div>
    <div align="center" class="form-group col-md-12">
     <button type="submit" class="btn btn-primary">SUBMIT</button>
    </div>
</div>
  {!! Form::close() !!}
  @if($data['total_result']>0)
    <div style="background-color: #7386D5; color: white; text-align: center;"><h4>RESULT</h4> </div>
  <div style="text-align: center;">
    
    Class : {{$data['Class']}} ||
       
    Session : {{$data['Session']}} ||
      
    Section : {{$data['Section']}} 
   

    <br>
    Total uploded : {{$data['total_result']}}
 
   <table style="text-align: center;" class="table">
    <thead>
      <tr>
        <th>Admission ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Parent Username</th>
        <th>Parent Password</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>
	
	@foreach ($student as $p)
        <tr>
          <td>{{$p->Student_id}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Nick_name}}</td>
          <td>{{$p->Student_id}}</td>
          <td>{{$p->Fathers_name}}</td>
          <td>{{$p->Fathers_mobile_no}}</td>
          
        </tr>
      @endforeach
	     
	@endif
    </tbody>
  </table>
@endsection