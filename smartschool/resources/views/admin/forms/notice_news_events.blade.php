@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">NOTICE/NEWS/EVENTS</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/save_notice_news_events', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
    <div class="form-group">
      <label for="inputEmail4">Type</label>
      <select id="inputState" class="form-control" name="Type" required>
        <option disabled selected>Select...</option>
        <option>Notice</option>
        <option>News</option>
        <option>Events</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputPassword4">Title</label>
      <input type="text" class="form-control" id="inputPassword4" name="Title" placeholder="Give a Title of this......" required>
    </div>
    <div class="form-group">
      <label for="inputEmail4">Notice/News/Events (pdf file)</label>
      <input type="file" class="form-control" id="Image" name="Pdf" placeholder="give notice_news_events (must be pdf file)" required>
    </div>

  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
  
{!! Form::close() !!}
@endsection

