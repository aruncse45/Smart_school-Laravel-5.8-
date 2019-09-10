@extends('admin.adminpage')

@section('maincontent')
<h4 id="e">UPDATE ABOUT SCHOOL </h4><br><br>
<hr>
    {{Session::get('msg')}}
    {!! Form::open(['url' => '/update_about_school', 'method'=>'POST', 'enctype'=>'multipart/form-data', 'name' => 'editform' ]) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">School name</label>
    <input type="text" class="form-control" id="exampleInputcategory" aria-describedby="emailHelp" placeholder="" name="School_name" value="{{ $update_about_school_id->School_name }}">
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Logo</label>
    <input type="file" class="form-control" id="file" onchange="checkfiledetails()" aria-describedby="emailHelp" placeholder="" name="Logo" value="">
    <img id="blah" src="#" alt="your image" style="border: 1px solid black; width: 100px; height: 100px;" /><br><br>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">Slogan</label>
    <textarea class="form-control" id="exampleInputdiscription" placeholder="" name="Slogan" value="">{{ $update_about_school_id->Slogan }}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputdiscription">About School</label>
    <textarea class="form-control" id="exampleInputdiscription" placeholder="" name="About_school" value="">{{ $update_about_school_id->About_school }}</textarea>
  </div>
 
  <input type="hidden" name="About_school_id" value="{{ $update_about_school_id->id }}">
  <button type="submit" class="btn btn-primary">Submit</button><br><br>



{!! Form::close() !!}
    

   

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
@endsection