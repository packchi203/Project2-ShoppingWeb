


<?php
session_start();
include_once 'includes/config.php';
$oid=intval($_GET['oid']);
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Tracking Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Wishlist</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time(); ?>">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/green.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/owl.transitions.css?v=<?php echo time(); ?>">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/rateit.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css?v=<?php echo time(); ?>">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

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
		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>

    <header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<body>

<div style="margin-left:50px; padding:10%;">
      <form name="updateticket" id="updateticket" method="post"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr height="50">
            <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
            
          </tr>
          <tr height="30">
            <td  class="fontkink1"><b>Mã Đơn Hàng:</b></td>
            <td  class="fontkink"><?php echo $oid;?></td>
          </tr>
        
          <?php 
      $ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
      $num=mysqli_num_rows($ret);
      if($num>0)
      {
      while($row=mysqli_fetch_array($ret))
            {
          ?>
          
          
          
            <tr height="20">
            <td class="fontkink1" ><b>Thời Gian:</b></td>
            <td  class="fontkink"><?php echo $row['postingDate'];?></td>
          </tr>
          <tr height="20">
            <td  class="fontkink1"><b>Trạng Thái :</b></td>
            <td  class="fontkink"><?php echo $row['status'];?></td>
          </tr>
          <tr height="20">
            <td  class="fontkink1"><b>Nội Dung:</b></td>
            <td  class="fontkink"><?php echo $row['remark'];?></td>
          </tr>

        
          <tr>
            <td colspan="2"><hr /></td>
          </tr>
        <?php } }
      else{
        ?>
        <tr>
        <td colspan="2"><strong>Trạng Thái</strong> Đơn Hàng Chưa Được Xử Lý</td>
        </tr>
        <?php  }
      $st='Delivered';
        $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
          while($num=mysqli_fetch_array($rt))
          {
          $currrentSt=$num['orderStatus'];
        }
          if($st==$currrentSt)
          { ?>
        <tr><td colspan="2"><b>
            Đơn Hàng Đã Được Giao Hoàn Thành </b></td>
        <?php
          } 
      
        ?>
      </table>
      </form>
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

</body>
</html>

     

     