@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">SPEECH</h4><br><br>
{{Session::get('msg')}}
{!! Form::open(['url' => '/update_speech', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Speaker name</label>
      <input type="text" class="form-control" id="inputPassword4" name="Speaker_name" placeholder="Name of speech man...." required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Designation</label>
      <input type="text" class="form-control" id="inputPassword4" name="Designation" placeholder="Designation...." required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Photo of speaker</label>
      <input type="file" class="form-control" id="Image" name="Speaker_image" placeholder="" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Speech</label>
      <input type="text" class="form-control" id="Image" name="Speech" placeholder="Type the speech here..." required>
    </div>
  </div>
  <input type="hidden" name="speech_id" value="{{ $update_speech_id->id }}">
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>

{!! Form::close() !!}
@endsection



      