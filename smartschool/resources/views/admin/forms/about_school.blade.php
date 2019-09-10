@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">ABOUT SCHOOL</h4><br><br>
  <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>School name</th>
        <th>Logo</th>
        <th>Slogan</th>
        <th>About School</th>
        <th>Operation</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        $i =0; 
      ?>

      @foreach ($about_school as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->School_name}}</td>
          <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_image/'.$p->Logo)}}"></td>
          <td>{{$p->Slogan}}</td>
          <td>{{$p->About_school}}</td>
          <td><a href="{{url('/update_about_school_form/'.$p->id)}}">UPDATE</a></td>
        </tr>
      @endforeach

    </tbody>
  </table>


@endsection