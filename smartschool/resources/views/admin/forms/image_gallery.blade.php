@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">IMAGE GALLERY</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>
  </div>
{!! Form::open(['url' => '/save_image_gallery', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-row">
    <div class="form-group" style="width: 100%">
      <label for="inputEmail4">Images</label>
      <input type="file" class="form-control" id="Image" name="Image[]" multiple="multiple" placeholder="" required>
    </div>
  </div>
  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
  
{!! Form::close() !!}
@endsection

