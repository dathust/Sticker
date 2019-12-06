<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>STCKER - SHOES SHOP</title>
<base href="{{asset('')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="Dat Pham">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="user_asset/css/bootstrap.css" rel="stylesheet">
<link href="user_asset/css/bootstrap-responsive.css" rel="stylesheet">
<link href="user_asset/css/style.css" rel="stylesheet">
<link href="user_asset/css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="user_asset/css/jquery.fancybox.css" rel="stylesheet">
<link href="user_asset/css/cloud-zoom.css" rel="stylesheet">
 

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="user_asset/assets/ico/favicon.html">
</head>
<body>
<!-- Header Start -->
<header>
  @include('user.block.header')
  <div class="container">

     @include('user.block.nav')
  </div>
</header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
   @include('user.block.slider')
   <!-- Slider End-->
  
  <!-- Section Start-->
  @include('user.block.otherdetail')
  <!-- Section End-->
  
   @yield('content')

<!-- Footer -->

  @include('user.block.footer')

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->




<script src="user_asset/js/jquery.js"></script>
<script src="user_asset/js/bootstrap.js"></script>
<script src="user_asset/js/respond.min.js"></script>
<script src="user_asset/js/application.js"></script>
<script src="user_asset/js/bootstrap-tooltip.js"></script>
<script defer src="user_asset/js/jquery.fancybox.js"></script>
<script defer src="user_asset/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="user_asset/js/jquery.tweet.js"></script>
<script  src="user_asset/js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="user_asset/js/jquery.validate.js"></script>
<script type="text/javascript"  src="user_asset/js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="user_asset/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="user_asset/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="user_asset/js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="user_asset/js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="user_asset/js/myscript.js"></script>
<script src="admin_asset/js/myscript.js"></script>
@yield('script')
</html>