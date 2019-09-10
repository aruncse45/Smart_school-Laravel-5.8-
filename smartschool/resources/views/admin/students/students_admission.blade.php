@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">STUDENT ADMISSION</h4><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/student_admission_form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div style="margin: 0 15%; " class="form-row">
     <div class="form-group col-md-4">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Section</label>
      <input type="text" class="form-control" id="inputPassword4" name="Section" placeholder="Section......" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Student file (CSV file)</label>
      <input type="file" class="form-control" id="Image" name="Students_file" placeholder="Result (must be CSV file)" required>
    </div>
    <div align="center" class="form-group col-md-12">
     <button type="submit" class="btn btn-primary">UPLOAD</button>
    </div>
</div>
  {!! Form::close() !!}
  @if($data['total_result']>0)
 
  <div style="text-align: center;">
    
    Class : {{$data['Class']}} ||
       
    Session : {{$data['Session']}} ||
      
    Section : {{$data['Section']}} 
   

    <br>
    Total uploded : {{$data['total_result']}}
 
   <table style="text-align: center;" class="table">
    <thead>
      <tr>
        <th>Serial no</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Religion</th>
        <th>Father's name</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>
	
	@foreach ($student as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Student_id}}</td>
          <td>{{$p->Religion}}</td>
          <td>{{$p->Fathers_name}}</td>
          <td>{{$p->Gender}}</td>
          
        </tr>
      @endforeach
	     
	@endif
    </tbody>
  </table>
@endsection