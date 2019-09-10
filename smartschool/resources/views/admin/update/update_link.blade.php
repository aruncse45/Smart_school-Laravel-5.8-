@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">UPDATE ABOUT SCHOOL </h4><br><br>
<hr>
    {{Session::get('msg')}}
    {!! Form::open(['url' => '/update_link', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">Link Name</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Link_name" value="" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Link URL</label>
    <input type="url" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Link_url" value="" required>
  </div>
 
  <input type="hidden" name="Link_id" value="{{ $update_link_id->id }}">
  <button type="submit" class="btn btn-primary">Submit</button><br><br>

{!! Form::close() !!}

@endsection