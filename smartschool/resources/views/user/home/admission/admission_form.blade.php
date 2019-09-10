<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admission Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #AAAEB4">


<br>
<h3 style="text-align: center;">ADMISSION FORM</h3>
<div style="text-align: center;"><marquee style="width: 45%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
{!! Form::open(['url' => '/student_admission_form_data', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
 
  <div style="margin: 0 15%; " class="form-row">
<<<<<<< HEAD
    <div style="width: 100%" class="form-group">
      <h5>STUDENT'S INFORMATION</h5>
    </div>
=======
    
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
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
<<<<<<< HEAD
     <select id="c" class="form-control" placeholder="Class" onchange="showdiv(this)"  name="Class" required>
        <option disabled selected>select class</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Session</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your academic session..." name="Session" required>
    </div>
    <div id="psc" style="display: none" class="form-group col-md-6">
      <label for="inputEmail4">PSC grade</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your PSC exam grade " name="Psc_grade" >
    </div>
    <div id="jsc" style="display: none" class="form-group col-md-6">
      <label for="inputEmail4">JSC grade</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your JSC exam grade " name="Jsc_grade" >
    </div>
    <div id="ps" style="display: none" class="form-group col-md-6">
      <label for="inputEmail4">Previous school</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your previous school " name="Previous_school" >
    </div>
  
    <div id="dept" style="display: none" class="form-group col-md-6">
      <label for="inputEmail4">Department (for class 9,10)</label>
      <select id="c" class="form-control" placeholder="Division"  name="Department" required>
        <option disabled selected>select department</option>
        <option>Science</option>
        <option>Arts</option>
        <option>Commerce</option>
      </select>
=======
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
      <input type="text" class="form-control" id="inputEmail4" placeholder="Academic session..." name="Session" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Father's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Father's name" name="Father_name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mother's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Mother's name" name="Mother_name" required>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
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
<<<<<<< HEAD
      <label for="inputEmail4">Religion</label>
      <select id="c" class="form-control" placeholder="Division"  name="Religion" required>
        <option disabled selected>select religion</option>
        <option>Muslim</option>
        <option>Hindu</option>
        <option>Christian</option>
        <option>Buddha</option>
       </select>
     
    </div>
    <div class="form-group col-md-6">
      <label for="inputAddress"></label>
      Physically challenged :&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox"  name="Physically_challenged" value="yes">
    </div>
    <div style="width: 100%" class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Village+Thana+Post+District+Division.." name="Address" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile no</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Mobile no" name="Mobile_no">
    </div>
    <div class="form-group col-md-6">
      <label for="inputAddress">Email</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Your email (if exist's)" name="Email">
=======
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
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Extracurriculam activities</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Extracurriculam activities" name="Extra_activities">
    </div>
<<<<<<< HEAD
=======
    
    <div class="form-group col-md-6">
      <label for="inputEmail4">Admission Date</label>
      <input type="Date" class="form-control" id="inputEmail4" placeholder="Admission date in this School" name="Admission_date" required>
    </div>
>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c

    <div class="form-group col-md-6">
      <label for="inputEmail4">Profile picture</label>
      <input type='file' class="form-control" id="file" name="Image"  onchange="checkfiledetails()"/>
      <a href="https://resizepic.com/resize.php" target="_blank">Click here for resize image </a><br>
      <span id="w"></span><br>
    </div>
    
<<<<<<< HEAD
    
    <img id="blah" src="#" alt="your image" style="border: 1px solid black; width: 100px; height: 100px;" /><br><br>

   
    <div style="width: 100%" class="form-group">
      <h5>GUARDIAN INFORMATION</h5>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Father's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Father's name" name="Fathers_name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile No</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Father's mobile no " name="Fathers_mobile_no" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Occupation</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Father's occupation" name="Fathers_occupation" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mother's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Mother's name" name="Mothers_name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mobile No</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Mother's mobile no" name="Mothers_mobile_no" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Occupation</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Mother's occupation" name="Mothers_occupation" required>
    </div>
=======
    <div class="form-group col-md-6">
      
    </div>
    <img id="blah" src="#" alt="your image" style="border: 1px solid white; width: 100px; height: 100px;" /><br><br>

   

>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
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

<<<<<<< HEAD
</script>
<script type="text/javascript">
    
  function showdiv(select) {
    if (select.value == 6) {
      document.getElementById('jsc').style.display = "none";
      document.getElementById('dept').style.display = "none";
      document.getElementById('ps').style.display = "none";
      document.getElementById('psc').style.display = "block";

    }
    if (select.value == 9 || select.value == 10) {
      document.getElementById('psc').style.display = "none";
      document.getElementById('jsc').style.display = "block";
      document.getElementById('dept').style.display = "block";
      document.getElementById('ps').style.display = "block";
    }
    if (select.value == 7 || select.value == 8) {
      document.getElementById('psc').style.display = "none";
      document.getElementById('jsc').style.display = "none";
      document.getElementById('dept').style.display = "none";
      document.getElementById('ps').style.display = "block";
      
    }
  }

</script>
</div>
  <br>
  <div style="width: 100%; text-align: center;" class="form-group">
  <button style="" type="submit" class="btn btn-primary" >SUBMIT</button></div>
  <br><br>
{!! Form::close() !!}

=======

</script>

</div>
  <br>
  <button type="submit" class="btn btn-lg btn-success btn-block" >Submit</button>
  <br>
{!! Form::close() !!}


>>>>>>> ff0675d14c7eb1043c2b4e8148c73b2957f55b9c
</body>
</html>
