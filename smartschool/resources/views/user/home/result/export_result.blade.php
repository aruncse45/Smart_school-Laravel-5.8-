<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>admission form</title>
  <style type="text/css">
      table,th,td{border: 1px solid black}
    </style>
</head>
<body>
  <a href="{{url('/download_result')}}"> <button type="submit" class="btn btn-primary">DOWNLOAD</button></a>
  <div align="center" style="font-size: 20px">
      @foreach ($student_result as $p)              
          <h4 style="text-transform: uppercase;">{{$about_us->School_name}}</h4>
          <h4 style="text-transform: uppercase;">RESULT OF {{$p->Exam_name}} EXAM</h4>
      @endforeach
  </div>  
<hr>
  <div style="font-size: 20px">
      @foreach ($student_result as $p)
        Name : {{$p->Name}}<br>
        Roll : {{$p->Roll}}
      @endforeach
  </div>
    <div align="center" style="font-size: 20px">
       <h4 style="text-transform: uppercase;">MARK SHEET</h4>
      @foreach ($student_result as $p)              
          <table style="text-align: center; width: 50%" align="center" >
            <tr><td>SUBJECT</td><td>MARK</td></tr>
            <tr style="text-align: left;"><td>Bangla :</td><td> {{$p->Bangla_1st}}</td></tr>
            <tr style="text-align: left;"><td>Bangla :</td><td> {{$p->Bangla_2nd}}</td></tr>
            <tr style="text-align: left;"><td>English :</td><td>{{$p->English_1st}}</td></tr>
            <tr style="text-align: left;"><td>English :</td><td>{{$p->English_2nd}}</td></tr>
            <tr style="text-align: left;"><td>Math :</td><td>{{$p->General_math}}</td></tr>
            <tr style="text-align: left;"><td>Physics :</td><td>{{$p->Physics}}</td></tr>
            <tr style="text-align: left;"><td>Chemistry :</td><td>{{$p->Chemistry}}</td></tr>
            <tr style="text-align: left;"><td>Biology :</td><td>{{$p->Biology}}</td></tr>
            <tr style="text-align: left;"><td>Highermath :</td><td>{{$p->Highermath}}</td></tr>
            <tr style="text-align: left;"><td>Religion :</td><td>{{$p->Religion}}</td></tr>
            <tr style="text-align: left;"><td>Socialscience :</td><td> {{$p->Socialscience}}</td></tr>
            <tr style="text-align: left;"><td>Total :</td><td> {{$p->Total}}</td></tr>
            <tr style="text-align: left;"><td>Grade :</td><td> {{$p->Grade}}</td></tr> 
          </table>
        
      @endforeach
    </div>
</body>
</html>
  
