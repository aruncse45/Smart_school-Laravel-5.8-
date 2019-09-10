@extends('admin.adminpage')

@section('maincontent')
  {{Session::get('msg')}}
  <h4 id="e">SPEECH</h4><br><br>
  <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
  <table class="table">
    <thead>
      <tr>
        <th>Serial no</th>
        <th>Speaker's name</th>
        <th>Designation</th>
        <th>Speaker's image</th>
        <th>Speech</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
      
    <?php
      $i =0; 
    ?>

      @foreach ($speech as $p)
      <tr>
    <td>{{++$i}}</td>
    <td>{{$p->Speaker_name}}</td>
    <td>{{$p->Designation}}</td>
    <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_image/'.$p->Speaker_image)}}"></td>
        
        <td>{{$p->speech}}</td>
        
        <td><a href="{{url('/update_speech_form/'.$p->id)}}">UPDATE</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>




@endsection