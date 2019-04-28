@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">STUDENT PROFILE</h4><br><br>
    <div align="center" style="font-size: 20px">
      @foreach ($result as $p)
        
          <img style="height: 100px; width: 100px" src="{{asset($p->Image)}}"><br><br>
          <table>
            <tr style="text-align: left;"><td>Student_id :</td><td> {{$p->Student_id}}</td></tr>
            <tr style="text-align: left;"><td>Name :</td><td>{{$p->Name}}</td></tr>
            <tr style="text-align: left;"><td>Class :</td><td>{{$p->Class}}</td></tr>
            <tr style="text-align: left;"><td>Roll :</td><td>{{$p->Roll}}</td></tr>
            <tr style="text-align: left;"><td>Father_name :</td><td>{{$p->Father_name}}</td></tr>
            <tr style="text-align: left;"><td>Mother_name :</td><td>{{$p->Mother_name}}</td></tr>
            <tr style="text-align: left;"><td>Birth_date :</td><td>{{$p->Birth_date}}</td></tr>
            <tr style="text-align: left;"><td>Gender :</td><td>{{$p->Gender}}</td></tr>
            <tr style="text-align: left;"><td>Blood_group :</td><td> {{$p->Blood_group}}</td></tr>
            <tr style="text-align: left;"><td>Mobile No :</td><td>{{$p->Mobile_no}}</td></tr>
            <tr style="text-align: left;"><td>Address :</td><td>{{$p->Address}},{{$p->District}},{{$p->Division}}</td></tr>
            <tr style="text-align: left;"><td>Extra_activities :</td><td>{{$p->Extra_activities}}</td></tr>
            <tr style="text-align: left;"><td>Admission_date :</td><td> {{$p->Admission_date}}</td></tr>
             
          </table>
        
      @endforeach
    </div>
      



@endsection