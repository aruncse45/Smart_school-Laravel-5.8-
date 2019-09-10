<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Download Result</title>
  <style type="text/css">
      table, th,td{border: 1px solid black;}
    </style>
</head>
<body>
  <h3 style="text-align: center; text-transform: uppercase;">{{$school->School_name}}</h3>
<<<<<<< HEAD
  <h4 style="text-align: center; text-transform: uppercase;">RESULT OF "{{$exam_name}}" EXAM</h4>
=======
  <h4 style="text-align: center; text-transform: uppercase;">RESULT OF {{$exam_name}} EXAM</h4>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
  <h4 style="text-align: center;">CLASS : {{$class}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SESSION : {{$session}}</h4>
  <hr>
  <table style="text-align: center; width: 100%" align="center">
    <thead>
      <tr>
        <th>id</th>
<<<<<<< HEAD
=======
        <th>Class</th>
        <th>Session</th>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
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
<<<<<<< HEAD
          <td>{{$p->Name}}</td>
          <td>{{$p->Roll}}</td>
          <td>{{$p->Bangla_1st}}</td>
=======
          <td>{{$p->Class}}</td>
          <td>{{$p->Session}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Roll}}</td>
          <td>{{$p->Bangla}}</td>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
        </tr>
      @endforeach

    </tbody>
  </table>

</body>
</html>
  