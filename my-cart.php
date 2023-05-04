<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Giỏ Hàng Đã Được Cập Nhật Lại');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Giỏ Hàng Đã Được Cập Nhật Lại');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	$size=$_POST['size'];
	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity,size) values('".$_SESSION['id']."','$qty','$val34','$size')");
header('location:payment-method.php');
}
}
}

// code for billing address updation
	


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Địa Chỉ Giao Hàng Đã Được Cập Nhật');</script>";
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

	    <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/green.css?v=<?php echo time(); ?>">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="assets/css/owl.transitions.css?v=<?php echo time(); ?>">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet?v=<?php echo time(); ?>">
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

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Giỏ Hàng</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">Xóa</th>
					<th class="cart-description item">Ảnh</th>
					<th class="cart-product-name item">Tên Sản Phẩm</th>
			
					<th class="cart-qty item">Số Lượng </th>
					<th class="cart-sub-total item">Size</th>
					<th class="cart-sub-total item">Tiền sản phẩm</th>
					
					<th class="cart-total last-item">Tổng Tiền</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Tiếp Tục Mua Sắm</a>
								<input type="submit" name="submit" value="Cập Nhật Lại " class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=30;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>

				<tr>
					<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $row['productImage1'];?>" alt="" width="114" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

$_SESSION['sid']=$pd;
						 ?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>
								<div class="reviews">
									( <?php echo htmlentities($num);?> Đánh Giá )
								</div>
								<?php } ?>
							</div>
						</div><!-- /.row -->
						
					</td>
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				             <input type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
				             
			              </div>
		            </td>
					<td class="cart-product-quantity">
						<div class="quant-input">
								<select  require style="background: none repeat scroll 0 0 #fff;
														border: 1px solid #f2f2f2;
														box-sizing: border-box;
														font-size: 15px;
														height: 35px;
														left: 0;
														padding: 0 10px 0 10px;
														position: absolute;
														top: 0;
														width: 70px;
														z-index: 1;" name="size" id="size">
												
												<option value="S">S</option>
												<option value="M">M</option>
												<option value="L">L</option>
												<option value="XL">XL</option>
												<option value="XXL">XXL</option>
											</select>
				             
				             
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo " ".$row['productPrice']; ?>.000<sup>đ</sup></span></td>


					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.000<sup>đ</sup></span></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div><!-- /.shopping-cart-table -->			<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Địa Chỉ Giao Hàng</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">


		<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="form-group">
					    <label class="info-title" for="Shipping Address">Địa Chỉ<span>*</span></label>
					    <textarea class="form-control unicase-form-control text-input"  name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
					  </div>



						<div class="form-group">
					    <label class="info-title" for="Billing State ">Quận/Huyện <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Billing City">Thành Phố / Tỉnh <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Mã Bưu Điện <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
					  </div>


					  <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Cập Nhật</button>
					<?php } ?>

		
						</div>
					
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>
<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<style>
						.black{
							color: #666 !important;
							font-size: 20px !important;
						}
					</style>
				<div  class="cart-grand-total black ">
						Tổng Tiền Hàng: <span class=""><?php echo $_SESSION['tp']="$subtotal". ".000<sup>đ</sup>"; ?></span>
					</div>
				<div class="cart-grand-total black">
						Phí Giao Hàng : 30.000<sup>đ</sup>
					</div>
					
					<hr>
					<div class="cart-grand-total">
						Tổng Hóa Đơn:
						<span class=""><?php echo $_SESSION['tp']="$totalprice". ".000<sup>đ</sup>"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" name="ordersubmit" class="btn btn-primary">Mua Hàng</button>
						
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>
	<?php } else {
echo "Giỏ Hàng Của Bạn Đang Trống , Hãy Mua Săm Thêm Nhé";
		}?>
</div>			</div>
		</div> 
		</form>
<?php echo include('includes/brands-slider.php');?>
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