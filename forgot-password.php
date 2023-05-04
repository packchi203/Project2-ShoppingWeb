<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and contactno='$contact'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="forgot-password.php";
mysqli_query($con,"update users set password='$password' WHERE email='$email' and contactno='$contact' ");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Password Changed Successfully";
exit();
}
else
{
$extra="forgot-password.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Contact no";
exit();
}
}


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

	    <title>Shopping Portal | Forgot Password</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time(); ?>">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/green.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/owl.transitions.css?v=<?php echo time(); ?>">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css?v=<?php echo time(); ?>" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/rateit.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css?v=<?php echo time(); ?>">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css?v=<?php echo time(); ?>">

		<link href="assets/css/green.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time(); ?>">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">
<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>
	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
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
				<li class='active'>Quên Mật Khẩu</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Quên Mật Khẩu</h4>
	<form class="register-form outer-top-xs" name="register" method="post">
	<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Địa Chỉ Email. <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" required >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Số Điện Thoại. <span>*</span></label>
		 <input type="text" name="contact" class="form-control unicase-form-control text-input" id="contact" required>
		</div>
<div class="form-group">
	    	<label class="info-title" for="password">Mật Khẩu. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required >
	  	</div>

<div class="form-group">
	    	<label class="info-title" for="confirmpassword">Nhập Lại Mật Khẩu. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required >
	  	</div>


		
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="change">Thay Đổi</button>
	</form>					
</div>
<!-- Sign-in -->


<!-- create a new account -->			</div><!-- /.row -->
		</div>

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