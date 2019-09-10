@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">STUDENT'S DETAIL</h4><br><br>

  

  {!! Form::open(['url' => '/students_detail_search_form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  <div style="" class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput"></label>
      <div class="input-group mb-2">
     <select id="type" class="form-control" placeholder=""  name="Class" required>
        <option disabled selected>Class&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
      </div>
    </div>
    
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        
        <input type="text" class="form-control" name="Section" id="input" placeholder="Section">
      </div>
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        
        <input type="text" class="form-control" name="Session" id="input" placeholder="Session">
      </div>
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        
        <input type="text" class="form-control" name="Name" id="input" placeholder="Student's name">
      </div>
    </div>

    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
{!! Form::close() !!}

  @if($data['total_result']>0)
     <div style="background-color: #7386D5; color: white; text-align: center;"><h4>RESULT</h4> </div>
  <div style="text-align: center;">
    @if($data['Class']!=null)
    Class : {{$data['Class']}} 
    @endif
    @if($data['Class']!=null)
    || Section : {{$data['Section']}} 
    @endif
    @if($data['Class']!=null)
    || Session : {{$data['Session']}} 
    @endif
    @if($data['Class']!=null)
    || Name : {{$data['Name']}} 
    @endif
    <br>
    Total : {{$data['total_result']}}  <!--<marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>-->
  </div>
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
          <th>DISABLE</th>
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
          <td><a href="{{url('/view_students_profile/'.$p->id)}}"><button class="btn btn-primary">VIEW</button></a></td>
          <td><a href="{{url('/edit_students_profile/'.$p->id)}}"><button class="btn btn-primary">Edit</button></a></td>
          <td><a href="{{url('/disable_students_profile/'.$p->id)}}"><button class="btn btn-primary">Disable</button></a></td>
          <td><a href="{{url('/ad_form_download_by_admin')}}"><button class="btn btn-primary">Download</button></a></td>
        </tr>
    
    
      @endforeach
      

    </tbody>
  </table>

@endif
<script type="text/javascript">
  var t;
  t = document.getElementById('type').value;
  if(t=='Date'){
    document.getElementById('input').type  = 'date';
  }
</script>
@endsection