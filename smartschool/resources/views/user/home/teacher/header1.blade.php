<nav  class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div style=" " class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul style="  width: 30%"   id="f" class="nav navbar-nav ml-auto">
                <li style="margin-left: 0%"><a id="a1" class="facility" href="{{url('/teacher_page')}}"><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
                      
                <li style="margin-left: 5%" class="dropdown">
                    <a data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> 
                            @foreach($teacher_info as $p)
                            {{$p->Nick_name}}
                            @endforeach     
                        <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a id="a" class="nav-link" href="{{url('/update_teacher_profile_page')}}"><i class="fa fa-cog"></i> Update profile</a></li>
                            <li><a id="a" class="nav-link" href="{{url('/teacher_settings')}}"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a id="a" class="nav-link" href="{{ url('/teacherlogout') }}"onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                                    <form id="logout-form" action="{{ url('/teacherlogout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                    </form></li>
                            
                        </ul>
                </li>                
            </ul>
        </div>
    </div>
</nav>

