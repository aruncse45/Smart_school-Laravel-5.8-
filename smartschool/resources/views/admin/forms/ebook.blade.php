@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">EBOOK</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>
  </div>
{!! Form::open(['url' => '/save_ebook', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-row">
  	<div class="form-group" style="width: 100%">
      <label for="inputEmail4">Book's Name</label>
      <input type="text" class="form-control" id="Image" name="Name" placeholder="Books name or title...." required>
    </div>
    <div class="form-group" style="width: 100%">
      <label for="inputEmail4">Ebooks</label>
      <input type="file" class="form-control" id="Image" name="Ebook" placeholder="" required>
    </div>
  </div>
  
  <button type="submit" class="btn btn-success">Submit</button>
  
{!! Form::close() !!}
@endsection


