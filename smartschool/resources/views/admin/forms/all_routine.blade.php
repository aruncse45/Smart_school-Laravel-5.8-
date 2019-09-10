@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">ALL ROUTINE</h4><br><br>
  <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Class</th>
        <th>Session</th>
        <th>Section</th>
        <th>pdf</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>

      @foreach ($routine as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Class}}</td>
          
          <td>{{$p->Session}}</td>
          <td>{{$p->Section}}</td>
          <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_pdf/'.$p->Pdf)}}"></td>
          <td><a href="{{url('/update_routine_form/'.$p->id)}}">UPDATE</a></td>
        </tr>
      @endforeach

    </tbody>
  </table>


@endsection