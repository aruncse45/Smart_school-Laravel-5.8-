@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">ADMISSION APPLIED</h4><br><br>

  

  {!! Form::open(['url' => '/admission_applied_search_form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
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
        <select id="c" class="form-control" placeholder="Division"  name="Department" >
        <option disabled selected>select department</option>
        <option>Science</option>
        <option>Arts</option>
        <option>Commerce</option>
      </select>
        
      </div>
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        
        <input type="date" class="form-control" name="Day" id="input" placeholder="Date">
      </div>
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        
        <input type="text" class="form-control" name="Month" id="input" placeholder="Month">
      </div>
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        
        <input type="text" class="form-control" name="Year" id="input" placeholder="Year">
      </div>
    </div>

    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
{!! Form::close() !!}
{!! Form::open(['url' => '/admission_applied_sort', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  <div style=" float: left;" class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput"></label>
      <div class="input-group mb-2">
     <select id="c" class="form-control" placeholder=""  name="Sort" required>
        <option disabled selected>Sort by</option>
        <option>Name</option>
        <option>Date</option>
        <option>Psc_grade</option>
        <option>Jsc_grade</option>
      </select>
      </div>
    </div>
    
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
{!! Form::close() !!}

  @if($data['total_result']>0)
 
  <div style="text-align: center;">
    @if($data['Class']!=null)
    Class : {{$data['Class']}} 
    @endif
    @if($data['Dept']!=null)
    || Dept : {{$data['Dept']}} 
    @endif
    @if($data['Day']!=null)
    || Day : {{$data['Day']}} 
    @endif
    @if($data['Month']!=null)
    || Month : {{$data['Month']}} 
    @endif
    @if($data['Year']!=null)
    || Year : {{$data['Year']}} 
    @endif
    <br>
    Total : {{$data['total_result']}}  <!--<marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>-->
  </div>
  <table style="text-align: center;" class="table">

   
    
      <thead>
        <tr>
          <th>Serial No</th>
          <th>Student ID</th>
          <th>Name</th>
          <th>Class</th>
          <th>Session</th>
          <th>PSC(gpa)</th>
          <th>JSC(gpa)</th>
          <th>Mobile no</th>
          <th>Gender</th>
          <th>Admission Date</th>
          <th>Image</th>
          <th>Visit Full Profile</th>
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
          <td>{{$p->Psc_grade}}</td>
          <td>{{$p->Jsc_grade}}</td>
          <td>{{$p->Mobile_no}}</td>
          <td>{{$p->Gender}}</td>
          <td>{{$p->created_at}}</td>
          <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_image/'.$p->Image)}}"></td>
          <td><a href="{{url('/view_students_profile/'.$p->id)}}"><button class="btn btn-primary">VIEW</button></a></td>
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