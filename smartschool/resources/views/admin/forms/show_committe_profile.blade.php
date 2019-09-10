@extends('admin.adminpage')

@section('maincontent')
  <h4 id="e">Committe</h4><br><br>
  <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}
  </marquee>
  </div>
  
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>NAME</th>
        <th>DESIGNATION</th>
        <th>ADDRESS</th>
        <th>IMAGE</th>
        <th>OPERATION</th>
      </tr>
    </thead>
    <tbody>
      
    <?php
      $i =0; 
    ?>
@foreach ($committe as $p)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$p->Name}}</td>
        <td>{{$p->Designation}}</td>
        <td>{{$p->Address}}</td>
        <td><img style="height: 50px; width: 50px" src="{{URL::asset('admin/upload_image/'.$p->Image)}}"></td>
        <td><a href="{{url('/update_committe_profile_form/'.$p->id)}}">UPDATE </a> </td>
      </tr>
      @endforeach
      

    </tbody>
  </table>




@endsection