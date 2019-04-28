@extends('user.master')

@section('maincontent')

<br>

<h3 style="text-align: center;">RESULT</h3>
<br>
 <div style="text-align: center;"><marquee style="width: 45%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/show_result', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Roll</label>
      <input type="text" class="form-control" id="Image" name="Roll" placeholder="Roll......" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>
   <div class="form-group col-md-6">
      <label for="inputEmail4">Exam name</label>
      <select id="inputState" class="form-control" name="Exam_name" required>
        <option disabled selected>Select...</option>
        <option>Half yearly</option>
        <option>Final</option>
        <option>Admission</option>
      </select>
    </div>
  </div>
  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
<hr>

<hr>
{!! Form::close() !!}

@endsection

