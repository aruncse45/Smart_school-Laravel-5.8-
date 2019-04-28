@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">UPDATE ABOUT SCHOOL </h4><br><br>
<hr>
    {{Session::get('msg')}}
    {!! Form::open(['url' => '/update_ex_student', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="Name" value="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Present Status</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="position, company name" name="Present_status" value="">
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Speech</label>
    <textarea class="form-control" id="exampleInputdiscription" placeholder="" name="Speech" value=""></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Image</label>
    <input type="file" class="form-control" id="file" onchange="checkfiledetails()" aria-describedby="emailHelp" placeholder="" name="Image" value="">
    
  </div>
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
           
            var reader = new FileReader();
            reader.onload = function(e){
              var img = new Image();
              img.src = e.target.result;
              img.onload = function(){
               $('#blah').attr('src', e.target.result);
              }
            
            };
          reader.readAsDataURL(file);
        }

      }
}


</script>
  <input type="hidden" name="Ex_student_id" value="{{ $ex_student_id->id }}">
  <button type="submit" class="btn btn-primary">Submit</button><br><br>

{!! Form::close() !!}

@endsection