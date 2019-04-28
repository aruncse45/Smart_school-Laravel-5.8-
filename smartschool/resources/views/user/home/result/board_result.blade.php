@extends('user.master')

@section('maincontent')
<br>

<h4 style="text-align: center;">BOARD RESULT</h4><br>
	
	<table class="table table-striped">
		<thead style="text-align: center;">
	      <tr>
	        <th>Serial no</th>
	        <th>Year</th>
	        <th>Exam Type</th>
	        <th>Total student</th>
	        <th>Pass</th>
	        <th>Fail</th>
	        <th>A Plus</th>
	        <th>Percentage %</th>
	      </tr>
      </thead>
      <tbody >
      <?php
        $i =0; 
      ?>

      @foreach ($result as $p)
        <tr>
          <td>{{++$i}}</td>
          <td>{{$p->Year}}</td>
          <td>{{$p->Exam_type}}</td>
          <td>{{$p->Total_student}}</td>
          <td>{{$p->Pass}}</td>
          <td>{{$p->Fail}}</td>
          <td>{{$p->A_plus}}</td>
          <td>{{$p->Percentage}}</td>
		</tr>
      @endforeach
  </tbody>
    </table>

<br>
@endsection