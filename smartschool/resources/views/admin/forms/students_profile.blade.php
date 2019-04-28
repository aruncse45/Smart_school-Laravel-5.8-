@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">Student Profile</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>

{!! Form::open(['url' => '/save_students_info', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
 
  <div style="margin: 0 15%; " class="form-row">
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Full Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Name" name="Name" required>
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nick name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your nick Name" name="Nick_name" required>
    </div>

    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Class</label>
     <select id="c" class="form-control" placeholder="Division"  name="Class" required>
        <option disabled selected>select class</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Session</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your academic session..." name="Session" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Father's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Father's name" name="Father_name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mother's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Mother's name" name="Mother_name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Birth Date</label>
      <input type="Date" class="form-control" id="inputEmail4" placeholder="Birth-date" name="Birth_date" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Gender</label>
      <select id="inputState" class="form-control" name="Gender" required>
        <option disabled selected>Select gender....</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Blood Group</label>
      <select id="inputState" class="form-control" placeholder="Division" name="Blood_group">
        <option disabled selected>select your blood group</option>
        <option>O+</option>
        <option>O-</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>AB+</option>
        <option>AB-</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile no</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Mobile no" name="Mobile_no" required>
    </div>
    <div style="width: 100%" class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Village+Thana+post.." name="Address" required>
    </div>
  
    <div class="form-group col-md-2">
      <label for="inputZip">District</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Your District" name="District" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Division</label>
      <select id="inputState" class="form-control" placeholder="Division" name="Division" required>
        <option disabled selected>select division</option>
        <option>Dhaka</option>
        <option>Chittagong</option>
        <option>Rajshahi</option>
        <option>Barisal</option>
        <option>Sylhet</option>
        <option>Khulna</option>
        <option>Rangpur</option>
        <option>Mymansing</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nationality</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Nationality" name="Nationality" required>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Extracurriculam activities</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Extracurriculam activities" name="Extra_activities">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Admission Date</label>
      <input type="Date" class="form-control" id="inputEmail4" placeholder="Admission date in this School" name="Admission_date" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Profile picture</label>
      <input type='file' class="form-control" id="file" name="Image"  onchange="checkfiledetails()"/>
      <a href="https://resizepic.com/resize.php" target="_blank">Click here for resize image </a><br>
      <span id="w"></span><br>
    </div>
    
    
    <img id="blah" src="#" alt="your image" style="border: 1px solid black; width: 100px; height: 100px;" /><br><br>

   

<script type="text/javascript">

    function generate_roll(){
        var classs = document.getElementById('c').value;
        var id = document.getElementById(classs).value;
        id = parseInt(id)+1;
        document.getElementById("student_id").value=id;
    }

    function checkfiledetails(){
      var fi = document.getElementById('file');
      if (fi.files.length > 0) {
        for (var i = 0; i <= fi.files.length - 1; i++) {
          var filename, fileextension;
          filename = fi.files.item(i).name;
          fileextension = filename.replace(/^.*\./, '');
          if (fileextension == 'png' || fileextension == 'PNG' || fileextension == 'jpg' || fileextension == 'JPG' ||fileextension == 'jpeg' || fileextension == 'JPEG') {
            readimagefile(fi.files.item(i));
          }
          else{$("#wa").text("must be"+maxheight+"X"+maxwidth);}
        }
    
        function readimagefile(file){
            var w = 0;
            var h = 0;
            var maxwidth = 300;
            var maxheight = 300;
            var reader = new FileReader();
            reader.onload = function(e){
              var img = new Image();
              img.src = e.target.result;
              img.onload = function(){
                var w = this.width;
                var h = this.height;
                
                if (w<=maxwidth && h<=maxheight) {
                  $('#blah').attr('src', e.target.result);
                  $("#w").text("");
                }
                else{ 
                  $("#w").text('Height : '+h+' Width : '+w+" || "+'image must be '+maxheight+'X'+maxwidth);
                }

              }
            
            };
          reader.readAsDataURL(file);
        }

      }
}


</script>

</div>
  <br>
  <button type="submit" class="btn btn-lg btn-success btn-block" >Submit</button>
  <br><br>
{!! Form::close() !!}
@endsection

