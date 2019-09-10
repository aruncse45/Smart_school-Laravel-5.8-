@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">DISABLE STUDENT'S</h4><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/disable_students_form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
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
        <th>Serial No</th>
        <th>Admission ID</th>
        <th>Name</th>
        <th>Class</th>
        <th>Session</th>
        <th>Mobile no</th>
        <th>Gender</th>
        <th>Father's name</th>
        <th>Admission Date</th>
        <th>Image</th>
        <th>Visit Full Profile</th>
        <th>EDIT</th>
        <th>CONFIRM</th>
        <th>DOWNLOAD</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>
	
	@foreach ($student as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Student_id}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Class}}</td>
          <td>{{$p->Session}}</td>
          <td>{{$p->Mobile_no}}</td>
          <td>{{$p->Gender}}</td>
          <td>{{$p->Fathers_name}}</td>
          <td>{{$p->created_at}}</td>
          <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_image/'.$p->Image)}}"></td>
          <td><a href="{{url('/view_students_profile/'.$p->id)}}"><button class="btn btn-primary">View</button></a></td>
          <td><a href="{{url('/edit_students_profile/'.$p->id)}}"><button class="btn btn-primary">Edit</button></a></td>
          <td><a href="{{url('/confirm_disable_students_profile/'.$p->id)}}"><button class="btn btn-primary">Cofirm</button></a></td>
          <td><a href="{{url('/ad_form_download_by_admin')}}"><button class="btn btn-primary">Download</button></a></td>
        </tr>
      @endforeach
	     
	@endif
    </tbody>
  </table>
@endsection