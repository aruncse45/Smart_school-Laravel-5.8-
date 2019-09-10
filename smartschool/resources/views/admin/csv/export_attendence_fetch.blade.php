@extends('admin.adminpage')

@section('maincontent')

  <h4 id="e">EXPORT ATTENDENCE</h4>
  <hr>

  <a href="{{url('/download_attendence')}}"> <button type="submit" class="btn btn-primary">DOWNLOAD ATTENDENCE</button></a>
  <hr>
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Roll</th>
        <th>P_A</th>
       
      </tr>
    </thead>
    <tbody>
      
    <?php
      $i =0; 
    ?>
      
      @foreach ($result as $key => $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Name}}</td>
          <td>{{$p->Roll}}</td>
          
          <td>{{$attendence[$p->Roll][0]->c}}</td>
         
        </tr>
      @endforeach
    
    </tbody>
  </table>





@endsection