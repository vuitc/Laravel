<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="{{asset('eshoe/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('admins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link  href="{{asset('admins/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        <link  href="{{asset('admins/css/theme.css')}}" rel="stylesheet">
        <link  href="{{asset('admins/images/icons/css/font-awesome.css')}}" rel="stylesheet">
        <link  href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Admin </a>
                    {{-- <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{ route('admin.get.index')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="{{ route('cat.index')}}"><i class="menu-icon icon-bullhorn"></i>Categories </a>
                                <li><a href="{{ route('color.index')}}"><i class="menu-icon icon-bullhorn"></i>Colors </a>
                                <li><a href="{{ route('size.index')}}"><i class="menu-icon icon-bullhorn"></i>Sizes </a>
                                <li><a href="{{ route('slider.index')}}"><i class="menu-icon icon-bullhorn"></i>Sliders </a>
                                <li><a href="{{ route('product.index')}}"><i class="menu-icon icon-bullhorn"></i>Product </a>
                                <li><a href="{{ route('dproduct.index')}}"><i class="menu-icon icon-bullhorn"></i>CtProduct </a>
                                </li>
                              
                            </ul>
                            <!--/.widget-nav-->
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <a href="{{ route('logout') }}" class="menu-icon icon-signout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    {{--  --}}
                    @yield('content');
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
            </div>
        </div>
        <script src="{{asset('admins/scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admins/scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admins/scripts/flot/jquery.flot.js')}}" type="text/javascript"></script>
        <script src="{{asset('admins/scripts/flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
        <script src="{{asset('admins/scripts/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{asset('admins/scripts/common.js')}}" type="text/javascript"></script>
      
    </body>
