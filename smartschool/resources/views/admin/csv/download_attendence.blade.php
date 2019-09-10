  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Download Attendence</title>
    <style type="text/css">
      table, th,td{border: 1px solid black;}
    </style>
  </head>
  <body>
  <h3 style="text-align: center; text-transform: uppercase;">{{$school->School_name}}</h3>
  <h4 style="text-align: center;"> ATTENDENCE </h4>
  <h4 style="text-align: center;">CLASS : {{$class}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SESSION :{{$session}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Month : {{$month}}</h4>
  <hr>
   <table style="text-align: center; width: 100%" align="center" >
    <thead>
      <tr>
        <th>Serial no</th>
        <th>Roll</th>
        <th>Name</th>
        <th>P_A</th>
       
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
          <td>{{$attendence[$p->Roll][0]->c}}</td>
         
        </tr>
      @endforeach

    </tbody>
  </table>

  </body>
  </html>
  





  