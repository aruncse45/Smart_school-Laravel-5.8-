@extends('admin.adminpage')

@section('maincontent')

  <h4 id="e">STUDENT'S RESULT</h4>
  <hr>
  <a href="{{url('/downloadresult')}}"><button type="submit" class="btn btn-primary">DOWNLOAD RESULT</button></a>

  <hr>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Class</th>
        <th>Session</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Bangla</th>
      </tr>
    </thead>
    <tbody>
      
    <?php
      $i =0; 
    ?>

      @foreach ($result as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Class}}</td>
          <td>{{$p->Session}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Roll}}</td>
<<<<<<< HEAD
          <td>{{$p->Bangla_1st}}</td>
=======
          <td>{{$p->Bangla}}</td>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
        </tr>
      @endforeach

    </tbody>
  </table>





@endsection