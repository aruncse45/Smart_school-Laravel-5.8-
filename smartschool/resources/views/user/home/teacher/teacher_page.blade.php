<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SmartShool Teacher</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <!-- Our Custom CSS -->
    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="{{URL::asset('admin/css/adminpagestyle.css')}}" rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('admin/css/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('admin/css/style1.css')}}" rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('admin/css/style2.css')}}" rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('admin/css/style3.css')}}" rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('admin/css/style.css')}}" rel='stylesheet' type='text/css'>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     
    <style type="text/css">
        #a{color: white}
        #a:hover{
            background: black;
            font: red;
        }
        .nav-item:hover{background: #6d7fcc; }
        .dropdown:hover{ }
        .nav-link:hover{color: white; }
    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            @include('user.home.teacher.sidebar')
        </nav>

        <!-- Page Content  -->
        
        <div id="nav" >
            @include('user.home.teacher.header')
        </div>
        <div id="content">
           @yield('maincontent')
           
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('admin/js/jquery.min.js')}}"></script>
   

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content, #nav, #e').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
        $(function(){
            $("#navbarSupportedContent #f a").bind("click", function(){
                $("#navbarSupportedContent #f a").removeClass("clicked");
                $(this).addClass("clicked");
            });
         });
        $(document).ready(function(){
            $('.facility').click(function(){
                $('.form').hide();
                $('#div'+$(this).attr('target')).show();
            });
        });
    </script>
</body>

</html>