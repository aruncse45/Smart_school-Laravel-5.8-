<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <title></title>
</head>
<body>
  <br>

<h4 style="text-align: center;" >ATTENDENCE SHEET</h4>
<h6 style="text-align: center;">Class: {{$data['class']}}, Section: {{$data['section']}}, Session: {{$data['session']}}, Date: {{$data['date']}}</h6>
  <hr>
  {!! Form::open(['url' => '/save_attendence', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  <table  class="table table-striped">
    <thead>
      <tr>
        <th>Roll</th>
        <th>Name</th>
        <th>P/A</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($result as $p)
      <tr>
    <td>{{$p->Roll}}</td>
    <td>{{$p->Name}}</td>

    <td><input type="checkbox" name="{{$p->Roll}}" value="yes"></td>
    <input type="hidden" name="Roll" value="{{$p->Roll}}">
    <input type="hidden" name="Name" value="{{$p->Name}}">
    </tr>
      @endforeach
    
    </tbody>

  </table>
  <td><input type="hidden" name="Class" value="{{$data['class']}}"></td>
    <td><input type="hidden" name="Session" value="{{$data['session']}}"></td>
    <td><input type="hidden" name="Date" value="{{$data['date']}}"></td>
    
    <button style=" margin: auto;" type="submit" class="btn btn-primary">Submit</button>
  {!! Form::close() !!}
</body>
</html>







  




