@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">Update Teacher or Staff info</h4><br><br>

{!! Form::open(['url' => '/update_teachers_staffs_profile', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
 
   <div class="form-row">
    <div style="width: 100%" class="form-group">
      <label for="inputState">Select</label>
      <select id="inputState" class="form-control" name="Teacher_Staff" >
        <option disabled selected>Slelct teacher/staff.....</option>
        <option>Teacher</option>
        <option>Staff</option>
      </select>
    </div>
    <div style="width: 100%" class="form-group">
      <h5>Personal information</h5>
    </div>
    <div style="width: 100%" class="form-group">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Name" name="Name" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Father's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Father's name" name="Father_name" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Mother's name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Mother's name" name="Mother_name" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Birth Date</label>
      <input type="Date" class="form-control" id="inputEmail4" placeholder="Birth-date" name="Birth_date" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Select</label>
      <select id="inputState" class="form-control" name="Gender" >
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
      <input type="text" class="form-control" id="inputEmail4" placeholder="Mobile no" name="Mobile_no" >
    </div>
    <div style="width: 100%" class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="Address" >
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">District</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Your District" name="District" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Division</label>
      <select id="inputState" class="form-control" placeholder="Division" name="Division" >
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
      <input type="text" class="form-control" id="inputEmail4" placeholder="Your Nationality" name="Nationality" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Profile picture</label>
      <input type='file' class="form-control" id="file" name="Image"  onchange="checkfiledetails()">
      <a href="https://resizepic.com/resize.php" target="_blank">Click here for resize image </a><br>
     <span id="w"></span><br>
    </div>
    <img id="blah" src="#" alt="your image" style="width: 100px; height: 100px;" /><br>
  
    <div style="width: 100%" class="form-group">
      <h5>Professional information</h5>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Employee Id</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Employee id" name="Employee_id" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Designation</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Designation" name="Designation" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Other</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Other" name="Other">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Qualification</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Educational background" name="Qualification" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Specialized Subject</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Specialized Subject" name="Specialized_Subject">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Gmail Account</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Gmail Account" name="Gmail_account">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Google Drive</label>
      <input type="url" class="form-control" id="inputEmail4" placeholder="Google drive link (if has)" name="Google_drive">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Other Account</label>
      <input type="url" class="form-control" id="inputEmail4" placeholder="Other social media account link (if has)" name="Social_media">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Join Date</label>
      <input type="Date" class="form-control" id="inputEmail4" placeholder="Join date in this School" name="Join_date" >
    </div>
      
    <div style="width: 100%" class="form-group">
      <h5>EDUCATIONAL INFORMATION</h5>
    </div>
    <div style="width: 100%" class="form-group ">
      <label for="inputEmail4">SSC</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="School name.." name="Ssc" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">HSC</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="College name..." name="Hsc" >
    </div>
   <div class="form-group col-md-6">
      <label for="inputState">HSC faculty</label>
      <select id="inputState" class="form-control" name="Faculty" >
        <option disabled selected>Select hsc faculty....</option>
        <option>Science</option>
        <option>Arts</option>
        <option>Commerce</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">College/University</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="" name="C_U" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Degree (from College/University)</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="" name="Degree" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Training</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="" name="Training" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Other</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Other" name="Other">
    </div>  


    <input type="hidden" name="teachers_staffs_profile_id" 
    value="{{ $update_teachers_staffs_profile_id->id}}">
 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

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
  
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button><br><br>
{!! Form::close() !!}
@endsection


 