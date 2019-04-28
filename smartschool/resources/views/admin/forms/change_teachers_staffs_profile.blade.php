@extends('admin.adminpage')

@section('maincontent')
  <h4 id="e">All Teacher/Stuff</h4><br><br>
  <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}
  </marquee>
  </div>
  
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>TEACHER/STAFF</th>
        <th>EMPLOYEE ID</th>
        <th>NAME</th>
        <th>PROFILE PICTURE</th>
        <th>OPERATION</th>
      </tr>
    </thead>
    <tbody>
      
    <?php
      $i =0; 
    ?>
@foreach ($teachers_staffs_profile as $p)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$p->Teacher_Staff}}</td>
        <td>{{$p->Employee_id}}</td>
        <td>{{$p->Name}}</td>
        <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_image/'.$p->Image)}}"></td>
        <td><a href="{{url('/update_teachers_staffs_profile_form/'.$p->id)}}">UPDATE </a></td>
      </tr>
      @endforeach
      

    </tbody>
  </table>




@endsection