@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">RESULT</h4><br><br>
{{ Session::get('msg')}}
{!! Form::open(['url' => '/export_due_csv', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  

    <div class="form-group">
      <label for="inputEmail4">Class</label>
      <input type="text" class="form-control" id="inputPassword4" name="Class" placeholder="Class...." required>
    </div>
    <div class="form-group">
      <label for="inputPassword4">Session</label>
      <input type="text" class="form-control" id="inputPassword4" name="Session" placeholder="Session......" required>
    </div>

  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>

{!! Form::close() !!}
@endsection


