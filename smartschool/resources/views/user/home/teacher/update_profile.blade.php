@extends('user.home.teacher.teacher_page_for_settings')

@section('maincontent')

    {!! Form::open(['url' => '/update_teacher_profile', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
    <h4 id="e">UPDATE PROFILE</h4>
    <br><br>
    <div style="text-align: center;"><marquee style="width: 10%; background-color: black; color: white;" scrollamount="2" behavior = "alternate">{{Session::get('msg')}}</marquee></div>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Name" placeholder ="Your name....">
    
    </div>

    <div class="form-group">
      <label for="exampleInputdiscription">Designation</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Designation" placeholder ="Your present class...">
    </div>

    <div class="form-group">
      <label for="exampleInputdiscription">Other Role</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Other_role" placeholder ="Your present class...">
    </div>

    <div class="form-group">
      <label for="exampleInputdiscription">Qualification</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Qualification" placeholder ="Your present class...">
    </div>

    <div class="form-group">
      <label for="exampleInputdiscription">Specialize Subject</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Specialized_subject" placeholder ="Your present class...">
    </div>

    <div class="form-group">
      <label for="exampleInputdiscription">Google Drive</label>
      <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Google_drive" placeholder ="Your present class...">
    </div>
    
    <div class="form-group">
      <label for="exampleInputdiscription">Profile picture</label>
      <input type='file' class="form-control" id="file" name="Pro_pic"  onchange="checkfiledetails()"/>
        <a href="https://resizepic.com/resize.php">Click here for resize image </a><br>
        <span id="w"></span><br>
      
    </div>
 
  <input type="hidden" name="Id" value="{{Session::get('t_id')}}">
  <img id="blah" src="#" alt="your image" style="border: 1px solid black; width: 100px; height: 100px;" /><br><br>

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
  <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
  <br><br>

{!! Form::close() !!}

@endsection