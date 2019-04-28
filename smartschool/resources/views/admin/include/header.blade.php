<nav style="" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" style="margin-top: 0;" class="btn btn-info">
            <i style="padding-top: 0;" class="fas fa-align-left"></i>
            <span>Toggle Sidebar</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/show_result_page')}}">RESULT</a>
                </li>
                
                
                <li class="dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a id="a" class="nav-link" href="{{url('/admin_profile/'.Auth::user()->email)}}"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                            <li><a id="a" class="nav-link" href="{{url('/admin_settings')}}"><i class="fa fa-cog"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a id="a" class="nav-link" href="{{ route('logout') }}"onclick    ="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                    </form>
                            </li>
                        </ul>
        <!-- /.dropdown-user -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>