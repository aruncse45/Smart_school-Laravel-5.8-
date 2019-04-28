@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">COMMITTE</h4><br><br>
<div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee>
  </div>
{!! Form::open(['url' => '/update_committe_profile', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
  
  <div class="form-row">
  	<div class="form-group" style="width: 100%">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="Image" name="Name" placeholder="Books name or title...." required>
    </div>
    <div class="form-group" style="width: 100%">
      <label for="inputEmail4">Designation</label>
      <input type="text" class="form-control" id="Image" name="Designation" placeholder="" required>
    </div>
    <div class="form-group" style="width: 100%">
      <label for="inputEmail4">Address</label>
      <input type="text" class="form-control" id="Image" name="Address" placeholder="" required>
    </div>
    <div class="form-group " style="width: 100%">
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
  <input type="hidden" name="Committe_id" value="{{ $update_committe_id->id }}">
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
  
{!! Form::close() !!}
@endsection


