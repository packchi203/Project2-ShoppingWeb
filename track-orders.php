<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Track Orders</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/green.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/owl.transitions.css?v=<?php echo time(); ?>">
		<link href="assets/css/lightbox.css?v=<?php echo time(); ?>" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/rateit.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/config.css?v=<?php echo time(); ?>">
		<link href="assets/css/green.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home">
	
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Kiểm Tra Đơn Hàng</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="track-order-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
	<h2>Kiểm Tra Đơn Hàng</h2>
	<span class="title-tag inner-top-vs">Vui lòng nhập Mã Đơn Hàng của bạn vào ô bên dưới và nhấn Enter. Điều này giúp bạn theo dõi đơn hàng ngay tận nhà ở bất cứ khi nào. </span>
	<form class="register-form outer-top-xs" role="form" method="post" action="order-details.php">
		<div class="form-group">
		    <label class="info-title" for="exampleOrderId1">Mã Đơn Hàng</label>
		    <input type="text" class="form-control unicase-form-control text-input" name="orderid" id="exampleOrderId1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleBillingEmail1">Email Đã Đăng Kí</label>
		    <input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleBillingEmail1" >
		</div>
	  	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Kiểm Tra</button>
	</form>	
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>