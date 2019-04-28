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
  <h4 style="text-align: center; text-transform: uppercase;">RESULT OF {{$exam_name}} EXAM</h4>
  <h4 style="text-align: center;">CLASS : {{$class}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SESSION : {{$session}}</h4>
  <hr>
  <table style="text-align: center; width: 100%" align="center">
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
          <td>{{$p->Bangla}}</td>
        </tr>
      @endforeach

    </tbody>
  </table>

</body>
</html>
  