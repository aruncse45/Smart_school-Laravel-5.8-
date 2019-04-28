@extends('admin.adminpage')

@section('maincontent')

  <h4 id="e">STUDENTS DUE csv</h4><br><br>
  <h5 style="text-align: center; color: black">CLASS : {{$class1}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SESSION :{{$session1}}</h5>
  <hr>

  <a href="{{url('/download_students_due')}}"> <button type="submit" class="btn btn-primary">DOWNLOAD DUE</button></a>
  <hr>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Roll</th>
        <th>Name</th>
        <th>Monthly Due</th>
        <th>Exam Due</th>
        <th>Other</th>
      </tr>
    </thead>
    <tbody>
      
    <?php
      $i =0; 
    ?>

      @foreach ($result as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Roll}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Monthly_due}}</td>
          <td>{{$p->Exam_due}}</td>
          <td>{{$p->other}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>





@endsection