<div style="" class="menu_area">
        <nav style="" class="navbar navbar-default navbar-fixed-top" role="navigation">  
          <div style=" width: 100%" class="container">
            <div style="" class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="index.html"><img style="height: 65px; width: 80px; margin-bottom: 10px"src="{{URL::asset('admin/upload_image/'.$about_us->Logo)}}"></a>              
              <!-- IMG BASED LOGO  -->
               <!-- <a class="navbar-brand" href="index.html"><img src="{{asset('public/admin')}}/img/logo.png" alt="logo"></a>  -->            
                     
            </div>
            <div style=" width: 100%; " id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">administration<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('/all_committe')}}">Committe</a></li>
                  </ul>
                </li> 
                <li><a href="{{url('/ebooks')}}">Ebook</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Teacher<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('/teacher_login_page')}}">LOGIN</a></li>
                    <li><a href="{{url('/all_teacher')}}">ALL TEACHER</a></li>
                                   
                  </ul>
                </li> 
                 <li><a href="{{url('/student_login_page')}}">Students</a></li>
                 
                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Result<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('/show_result_page')}}">School result</a></li>
                    <li><a href="{{url('/board_result_show')}}">Board result</a></li>
                                   
                  </ul>
                </li> 
                <li><a href="{{url('/gallery')}}">Gallery</a></li>       
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Academic<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('/search_routine')}}">Routine</a></li>
                    <li><a href="{{url('/search_syllabus')}}">Syllabus</a></li>
                    <li><a href="{{url('/search_booklist')}}">Booklist</a></li>
                    <li><a href="{{url('/attendence')}}">Attendence</a></li>               
                  </ul>
                </li>  
                 <li><a href="{{url('/admission_form')}}">Admission</a></li>             
                <li><a href="#HJ">Contact</a></li>
              </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU --> 
      