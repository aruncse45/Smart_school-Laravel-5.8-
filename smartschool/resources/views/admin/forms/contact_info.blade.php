@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">CONTACT INFO</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/save_contact_info', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div style="margin: 0 15%" class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Address</label>
      <input type="text" class="form-control" id="Image" name="Address" placeholder="full address with post code..." >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile No</label>
      <input type="text" class="form-control" id="inputPassword4" name="Mobile" placeholder="Class...." >
    </div>
     <div class="form-group col-md-6">
      <label for="inputPassword4">Telephone No</label>
      <input type="text" class="form-control" id="inputPassword4" name="Telephone" placeholder="Section......" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="Email" class="form-control" id="inputPassword4" name="Email" placeholder="Section......" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Fax</label>
      <input type="text" class="form-control" id="inputPassword4" name="Fax" placeholder="Session......" >
    </div>

  </div>
  <button type="submit" class="btn btn-lg btn-success btn-block">INSERT</button>
  <button type="submit" class="btn btn-lg btn-success btn-block">UPDATE</button>
    

{!! Form::close() !!}
@endsection

