@extends('user.home.student.student_page')

@section('maincontent')
	
	<div id="div1" class="form" style="display: ">
		<!DOCTYPE html>
		<html lang="en">
			<head>
			  <title>Bootstrap Example</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
			</head>
			<body>

			<div class="container">
			  <h2>SYLLABUS</h2>
			  <ul class="nav nav-tabs">
				<?php 
					$i = 0;
				?>
				@foreach($syllabus as $p)
					<?php 	if($i==0){ ?>
						<li class="active"><a data-toggle="tab" href="#menu{{$p->Class}}">Class {{$p->Class}}</a></li>
					<?php $i++;
					 } 
			 		else{ ?> 	
			 			<li><a data-toggle="tab" href="#menu{{$p->Class}}">Class {{$p->Class}}</a></li>
			 		<?php $i++; } ?>	
		 		@endforeach
			  </ul>

			  <div class="tab-content">
				<?php 
					$i = 0;
				 ?>
				@foreach($syllabus as $p)	
				<?php 	if($i==0){ ?>
			  		<div id="menu{{$p->Class}}" class="tab-pane fade in active">
			    		
			    		<div align="center">
							<object data="{{URL::asset('admin/upload_pdf/'.$p->Pdf)}}" type="application/pdf" width="70%" 		height="400px">
								<a href="{{URL::asset('admin/upload_pdf/'.$p->Pdf)}}">test.pdf</a>
							</object>
						</div>

			 		</div> <?php $i++; } 
			 		else{ ?>
			 		<div id="menu{{$p->Class}}" class="tab-pane fade">
			    		
			    		<div align="center">
							<object data="{{URL::asset('admin/upload_pdf/'.$p->Pdf)}}" type="application/pdf" width="70%" 		height="400px">
								<a href="{{URL::asset('admin/upload_pdf/'.$p->Pdf)}}">test.pdf</a>
							</object>
						</div>

			 		</div>
			 	<?php $i++; } ?>
			 	
			 	@endforeach

			  </div>
			</div>

			</body>
		</html>

	</div>
    <div id="div2" class="form" style="display: none">
    	<!DOCTYPE html>
		<html lang="en">
			<head>
			  <title>Bootstrap Example</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			 
			</head>
			<body>

			<div class="container">
			  <h2>ROUTINE</h2>
			  <ul class="nav nav-tabs">
				<?php 
					$i = 0;
				?>
				@foreach($routine as $q)
					<?php 	if($i==0){ ?>
						<li class="active"><a data-toggle="tab" href="#menu{{$q->Class}}<?php echo($i) ?>">Class {{$q->Class}}<br>Section {{$q->Section}}</a></li>
					<?php $i++;
					 } 
			 		else{ ?> 	
			 			<li><a data-toggle="tab" href="#menu{{$q->Class}}<?php echo($i) ?>">Class {{$q->Class}}<br>Section {{$q->Section}}</a></li>
			 		<?php $i++; } ?>	
		 		@endforeach
			  </ul>

			  <div class="tab-content">
				<?php 
					$i = 0;
				 ?>
				@foreach($routine as $q)	
				<?php 	if($i==0){ ?>
			  		<div id="menu{{$q->Class}}<?php echo($i) ?>" class="tab-pane fade in active">
			    		
			    		<div align="center">
							<object data="{{URL::asset('admin/upload_pdf/'.$q->Pdf)}}" type="application/pdf" width="70%" 		height="400px">
								<a href="{{URL::asset('admin/upload_pdf/'.$q->Pdf)}}">test.pdf</a>
							</object>
						</div>

			 		</div> <?php $i++; } 
			 		else{ ?>
			 		<div id="menu{{$q->Class}}<?php echo($i) ?>" class="tab-pane fade">
			    		
			    		<div align="center">
							<object data="{{URL::asset('admin/upload_pdf/'.$q->Pdf)}}" type="application/pdf" width="70%" 		height="400px">
								<a href="{{URL::asset('admin/upload_pdf/'.$q->Pdf)}}">test.pdf</a>
							</object>
						</div>

			 		</div>
			 	<?php $i++; } ?>
			 	
			 	@endforeach

			  </div>
			</div>

			</body>
		</html>
    </div>

    <div id="div3" class="form" style="display: none">
    	<!DOCTYPE html>
		<html lang="en">
			<head>
			  <title>Bootstrap Example</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  
			</head>
			<body>

			<div class="container">
			  <h2>BOOKLIST</h2>
			  <ul class="nav nav-tabs">
				<?php 
					$i = 0;
				?>
				@foreach($booklist as $r)
					<?php 	if($i==0){ ?>
						<li class="active"><a data-toggle="tab" href="#menu{{$r->Class}}">Class {{$r->Class}}</a></li>
					<?php $i++;
					 } 
			 		else{ ?> 	
			 			<li><a data-toggle="tab" href="#menu{{$r->Class}}">Class {{$r->Class}}</a></li>
			 		<?php $i++; } ?>	
		 		@endforeach
			  </ul>

			  <div class="tab-content">
				<?php 
					$i = 0;
				 ?>
				@foreach($booklist as $r)	
				<?php 	if($i==0){ ?>
			  		<div id="menu{{$r->Class}}" class="tab-pane fade in active">
			    		
			    		<div align="center">
							<object data="{{URL::asset('admin/upload_pdf/'.$r->Pdf)}}" type="application/pdf" width="70%" 		height="400px">
								<a href="{{URL::asset('admin/upload_pdf/'.$r->Pdf)}}">test.pdf</a>
							</object>
						</div>

			 		</div> <?php $i++; } 
			 		else{ ?>
			 		<div id="menu{{$r->Class}}" class="tab-pane fade">
			    		
			    		<div align="center">
							<object data="{{URL::asset('admin/upload_pdf/'.$r->Pdf)}}" type="application/pdf" width="70%" 		height="400px">
								<a href="{{URL::asset('admin/upload_pdf/'.$r->Pdf)}}">test.pdf</a>
							</object>
						</div>

			 		</div>
			 	<?php $i++; } ?>
			 	
			 	@endforeach

			  </div>
			</div>

			</body>
		</html>
    </div>
    <div id="div4" class="form" style="display: none">
    	<!DOCTYPE html>
		<html lang="en">
			<head>
			  <title>Bootstrap Example</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  
			</head>
			<body>

			<div class="container">
			  <h2>ALL DUES</h2>
			  <table class="table">
			@foreach($dues as $due)
			    <thead>
			      <tr class="danger">
			        <th>Monthly due</th>
			        <td>{{$due->Monthly_due}}</td>
			       
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="info">
			        <th>Exam due</th>
			        <td>{{$due->Exam_due}}</td>
			        
			      </tr>      
			      <tr class="success">
			        <th>Other</th>
			        <td>{{$due->other}}</td>
			       </tr>
			    </tbody>
			  </table>
			</div>
			@endforeach
			</body>
		</html>
    </div>
    

		
    


@endsection
