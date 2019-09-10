@extends('admin.adminpage')

@section('maincontent')
  
  <h4 id="e">STUDENT PROFILE</h4><br><br>
    <div align="center" style="font-size: 20px">
<<<<<<< HEAD
     
        
      @foreach ($result as $p)
        
          <img style="height: 100px; width: 100px" src="{{URL::asset('admin/upload_image/'.$p->Image)}}"><br><br>
          <table>
            <tr style="text-align: left;"><td>Student_id :</td><td> {{$p->Student_id}}</td></tr>
            <tr style="text-align: left;"><td>Name :</td><td>{{$p->Name}}</td></tr>
            <tr style="text-align: left;"><td>Nick name :</td><td>{{$p->Nick_name}}</td></tr>
            <tr style="text-align: left;"><td>Class :</td><td>{{$p->Class}}</td></tr>
             <tr style="text-align: left;"><td>Section :</td><td>{{$p->Section}}</td></tr>
            <tr style="text-align: left;"><td>Session :</td><td>{{$p->Session}}</td></tr>

            <tr style="text-align: left;"><td>Roll :</td><td>{{$p->Roll}}</td></tr>
            <tr style="text-align: left;"><td>Psc_grade :</td><td>{{$p->Psc_grade}}</td></tr>
            <tr style="text-align: left;"><td>Jsc_grade :</td><td>{{$p->Jsc_grade}}</td></tr>
            <tr style="text-align: left;"><td>Department :</td><td>{{$p->Department}}</td></tr>
            <tr style="text-align: left;"><td>Birth_date :</td><td>{{$p->Birth_date}}</td></tr>
            <tr style="text-align: left;"><td>Gender :</td><td>{{$p->Gender}}</td></tr>
            <tr style="text-align: left;"><td>Blood_group :</td><td> {{$p->Blood_group}}</td></tr>
            <tr style="text-align: left;"><td>Religion :</td><td> {{$p->Religion}}</td></tr>
            <tr style="text-align: left;"><td>Mobile No :</td><td>{{$p->Mobile_no}}</td></tr>
            <tr style="text-align: left;"><td>Address :</td><td>{{$p->Address}}</td></tr>
            <tr style="text-align: left;"><td>Extra_activities :</td><td>{{$p->Extra_activities}}</td></tr>
            <tr style="text-align: left;"><td>Admission_date :</td><td>{{$p->created_at}}</td></tr><br>
            <tr style="text-align: left;"><td>Fathers_name :</td><td>{{$p->Fathers_name}}</td></tr>
            <tr style="text-align: left;"><td>Fathers_occupation :</td><td> {{$p->Fathers_occupation}}</td></tr>
            <tr style="text-align: left;"><td>Fathers_mobile_no :</td><td> {{$p->Fathers_mobile_no}}</td></tr>
            <tr style="text-align: left;"><td>Mothers_name :</td><td>{{$p->Mothers_name}}</td></tr>
            <tr style="text-align: left;"><td>Mothers_occupation :</td><td>{{$p->Mothers_occupation}}</td></tr>
            
            <tr style="text-align: left;"><td>Mothers_mobile_no :</td><td>{{$p->Mothers_mobile_no}}</td></tr>
=======
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
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
             
          </table>
        
      @endforeach
<<<<<<< HEAD
  
    </div><br><br>
=======
    </div>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
      



@endsection