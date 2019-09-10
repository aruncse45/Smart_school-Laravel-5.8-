@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">RESULT</h4><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/save_result', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
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
      <label for="inputEmail4">Exam name</label>
      <select id="inputState" class="form-control" name="Exam_name" required>
        <option disabled selected>Select...</option>
        <option>Half yearly</option>
        <option>Final</option>
        <option>Admission test</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Result (CSV file)</label>
      <input type="file" class="form-control" id="Image" name="Result" placeholder="Result (must be CSV file)" required>
    </div>
    <div align="center" class="form-group col-md-12">
     <button type="submit" class="btn btn-primary">UPLOAD</button>
    </div>
</div>
  {!! Form::close() !!}
  <div style="background-color: #7386D5; color: white; text-align: center;"><h4>Saved Result</h4> </div>
   <table style="text-align: center;" class="table">
    <thead>
      <tr>
        <th>Serial no</th>
        <th>Exam name</th>
        <th>Session</th>
        <th>Class</th>
        <th>View Result</th>
        <th>Download Result</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>

      @foreach ($result as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Exam_name}}</td>
          <td>{{$p->Session}}</td>
          <td>{{$p->Class}}</td>
          <td><a href="{{url('/view_result/'.$p->id)}}"><button class="btn btn-primary">VIEW</button></a>
          </td>
          <td><a href="{{url('/download_result/'.$p->id)}}"><button class="btn btn-primary">DOWNLOAD</button></a>
          </td>
          <td><a href="{{url('/delete_result/'.$p->id)}}"><button class="btn btn-primary">DOWNLOAD</button></a>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection

