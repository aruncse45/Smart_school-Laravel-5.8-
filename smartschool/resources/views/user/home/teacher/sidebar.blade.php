<div style="text-align: center;" class="sidebar-header">
    <h3>PROFILE</h3>
</div>

<div style="text-align: center; overflow: auto;">
     @foreach($teacher_info as $p)
            <img style="height: 50%; width: 50%; "  src="{{URL::asset('admin/upload_image/'.$p->Image)}}">
            <br><br>
            
            Employee ID : {{$p->Employee_id}}<br><br>
            Name : {{$p->Name}}<br><br>
            Father's name : {{$p->Father_name}}<br><br>
            Mother's name : {{$p->Mother_name}}<br><br>

        @endforeach
</div>
    