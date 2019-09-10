<!DOCTYPE html>
<html lang="en">
  <head>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Smart School</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{URL::asset('admin/img/wpf-favicon.png')}}"/>
    
     <link href="{{URL::asset('admin/css/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="{{URL::asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="{{URL::asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="{{URL::asset('admin/css/superslides.css')}}">
    <!-- Slick slider css file -->
    <link href="{{URL::asset('admin/css/slick.css')}}" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href="{{URL::asset('admin/css/style1.css')}}">  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="{{URL::asset('admin/css/animate.css')}}"> 
    <!-- preloader -->
    <link rel="stylesheet" href="{{URL::asset('admin/css/queryLoader.css')}}" type="text/css" />
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="{{URL::asset('admin/css/jquery.tosrus.all.css')}}" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="{{URL::asset('admin/css/themes/default-theme.css')}}" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="{{URL::asset('admin/style.css')}}" rel="stylesheet">
   
    <!-- Google fonts -->
    <link href="{{URL::asset('admin/css/style2.css')}}" rel='stylesheet' type='text/css'>   
    <link href="{{URL::asset('admin/css/style3.css')}}" rel='stylesheet' type='text/css'>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{asset('public/admin')}}/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="{{asset('public/admin')}}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  </head>
  <body>    

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      @include('user.include.header')   
    </header>
    <!--=========== END HEADER SECTION ================--> 

    <!--=========== BEGIN SLIDER SECTION ================-->
        <div id="page-wrapper" >
            @yield('maincontent')
        </div>
       
    
    <!--=========== END STUDENTS TESTIMONIAL SECTION ================-->    
    
    <!--=========== BEGIN FOOTER SECTION ================-->
    <footer id="footer">
      <!-- Start footer top area -->
      @include('user.include.footer')
      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================--> 

  

    <!-- Javascript Files
    ================================================== -->
   

    <!-- initialize jQuery Library -->
    <script src="{{URL::asset('admin/js/js1.js')}}"></script>
    <!-- Preloader js file -->
    <script src="{{URL::asset('admin/js/queryloader2.min.js')}}" type="text/javascript"></script>
    <!-- For smooth animatin  -->
    <script src="{{URL::asset('admin/js/wow.min.js')}}"></script>  
    <!-- Bootstrap js -->
    <script src="{{URL::asset('admin/js/bootstrap.min.js')}}"></script>
    <!-- slick slider -->
    <script src="{{URL::asset('admin/js/slick.min.js')}}"></script>
    <!-- superslides slider -->
    <script src="{{URL::asset('admin/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{URL::asset('admin/js/jquery.animate-enhanced.min.js')}}"></script>
    <script src="{{URL::asset('admin/js/jquery.superslides.min.js')}}" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
    <script src="{{URL::asset('admin/js/js2.js')}}"></script>
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="{{URL::asset('admin/js/jquery.tosrus.min.all.js')}}"></script>   
   
    <!-- Custom js-->
    <script src="{{URL::asset('admin/js/custom.js')}}"></script>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->
    

  </body>
</html>