@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">SAVE BOARD RESULT</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/save_board_result', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div style="margin: 0 15%" class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Year</label>
      <input type="text" class="form-control" id="inputPassword4" name="Year" placeholder="Class...." required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Exam type</label>
      <select id="inputState" class="form-control" name="Exam_type" required>
        <option disabled selected>Select gender....</option>
        <option>JSC</option>
        <option>SSC</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total student</label>
      <input type="text" class="form-control" id="inputPassword4" name="Total_student" placeholder="Session......" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Pass</label>
      <input type="text" class="form-control" id="inputPassword4" name="Pass" placeholder="Section......" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Fail</label>
      <input type="text" class="form-control" id="Image" name="Fail" placeholder="" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">A +</label>
      <input type="text" class="form-control" id="inputPassword4" name="A_plus" placeholder="Section......" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Percentage</label>
      <input type="text" class="form-control" id="Image" name="Percentage" placeholder="" required>
    </div>

  </div>
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
    

{!! Form::close() !!}
@endsection

