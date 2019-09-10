<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Teacher</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/css/teacher.css')}}">
</head>
<body style="background-color: #313B3D; color: white">
<br>
  <div style="text-align: center; ">
    <h3 style="text-align: center; text-transform: uppercase;">{{$t->Name}}</h3><br>
    <img  src="{{URL::asset('admin/upload_image/'.$t->Image)}}"><br>
  </div>  
  

<!------ Include the above in your HEAD tag ---------->

<br/><br/>
<div class="tabs">
  <div class="tab-button-outer">
    <ul id="tab-button">
      <li><a href="" id="#tab01">PERSONAL &nbsp;&nbsp;&nbsp;&nbsp; INFORMATION</a></li>
      <li><a href="" id="#tab02">PROFESSIONAL INFORMATION</a></li>
      <li><a href="" id="#tab03">EDUCATIONAL INFORMATION</a></li>
      
       <li><a href="" id="#tab04">TRAINING/OTHER INFORMATION</a></li>
    </ul>
  </div>
  <div class="tab-select-outer">
    <select id="tab-select">
      <option value="#tab01">PERSONAL INFORMATION</option>
      <option value="#tab02">PROFESSIONAL INFORMATION</option>
      <option value="#tab03">EDUCATIONAL INFORMATION</option>
      
       <option value="#tab04">TRAINING/OTHER INFORMATION</option>
    </select>
  </div>

  <div id="tab01" class="tab-contents">
    <h5>Nick name : {{$t->Nick_name}}</h5>
    <h5>Father's name : {{$t->Father_name}}</h5>
    <h5>Mother's name : {{$t->Mother_name}}</h5>
    <h5>Birth Date : {{$t->Birth_date}}</h5>
    <h5>Gender : {{$t->Gender}}</h5>
    <h5>Blood group : {{$t->Blood_group}}</h5>
    <h5>Mobile no : {{$t->Mobile_no}}</h5>
    <h5>Address : {{$t->Address}},{{$t->District}},{{$t->Division}}</h5>
    <h5>Nationality : {{$t->Nationality}}</h5>
  </div>
  <div id="tab02" class="tab-contents">
    <h5>Employee ID : {{$t->Employee_id}}</h5>
    <h5>Join Date : {{$t->Join_date}}</h5>
    <h5>Designation : {{$t->Designation}}</h5>
    <h5>Other Designation : {{$t->Other_role}}</h5>
    <h5>Qualification : {{$t->Qualification}}</h5>
    <h5>Specialized Subject : {{$t->Specialized_subject}}</h5>
    <h5>Gmail Account : {{$t->Gmail_account}}</h5>
    <h5>Google Drive : {{$t->Google_drive}}</h5>
    <h5>Social Media{{$t->Social_media}}</h5>
    
    
  </div>
  <div id="tab03" class="tab-contents">
    <table style="text-align: center;" class="table table-striped">
      <tr>
        <th>INSTITUTE NAME</th>
        <th>NAME OF DEGREE</th>
        <th>COUNTRY</th>
      </tr>
      <tr>
        <td>{{$t->Ssc}}</td>
        <td>SSC</td>
        <td>Bangladesh</td>
      </tr>
      <tr>
        <td>{{$t->Hsc}}</td>
        <td>HSC {{$t->faculty}}</td>
        <td>Bangladesh</td>
      </tr>
      <tr>
        <td>{{$t->C_U}}</td>
        <td>{{$t->Degree}}</td>
        <td>Bangladesh</td>
      </tr>
    </table>
  </div>
  <div id="tab04" class="tab-contents">
    <h5>Training : {{$t->Training}}</h5>
    <h5> Other : {{$t->Other}}</h5>
    
  </div>
</div>
<script type="text/javascript" src="{{URL::asset('admin/js/teacher.js')}}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</body>
</html>





