<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Sản Phẩm Đã Được Thêm Vào Giỏ Hàng')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
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

	    <title>Shopping Portal Home Page</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
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
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css?v=<?php echo time(); ?>" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css?v=<?php echo time(); ?>">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
	<?php include('includes/side-menu.php');?>
<!-- ================================== TOP NAVIGATION : END ================================== -->
			</div><!-- /.sidemenu-holder -->	
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
			
<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(assets/images/sliders/slide1.jpeg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
	    
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/slide2.jpeg);">
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(assets/images/sliders/slide3.jpeg);">
				<!-- /.container-fluid -->
			</div><!-- /.item -->
		</div><!-- /.full-width-slider -->
	    

	</div><!-- /.owl-carousel -->
</div>
			

<!-- ============================================== INFO BOXES : END ============================================== -->		
			</div><!-- /.homebanner-holder -->
			
		</div><!-- /.row -->

		<!-- ============================================== SCROLL TABS1 ============================================== -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left"> Sản Phẩm Mới Nhất</h3>
				
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
					<?php
					$ret=mysqli_query($con,"SELECT * FROM products ORDER BY id DESC ");
					while ($row=mysqli_fetch_array($ret)) 
					{
						# code...


					?>

										
					<div class="item item-carousel">
						<div class="products">
							
					<div class="product">		
					<div class="product-image">
						<div class="image">
							<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
							<img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%" alt=""></a>
						</div><!-- /.image -->			

													
					</div><!-- /.product-image -->
						
					
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
								<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>		</span>
													
												
						</div><!-- /.product-price -->
						
					</div><!-- /.product-info -->
					<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div><!-- /.product -->
			
					</div><!-- /.products -->
					</div><!-- /.item -->
					<?php } ?>

						</div><!-- /.home-owl-carousel -->
								</div><!-- /.product-slider -->
							</div>




					<div class="tab-pane" id="books">
						<div class="product-slider">
							<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
					<?php
					$ret=mysqli_query($con,"select * from products where category=9");
					while ($row=mysqli_fetch_array($ret)) 
					{
						# code...


					?>

									
					<div class="item item-carousel">
					<div class="products">
						
					<div class="product">		
					<div class="product-image">
					<div class="image">
						<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
						<img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%" alt=""></a>
					</div><!-- /.image -->			

													
					</div><!-- /.product-image -->
					
				
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
								<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>			</span>
													
												
						</div><!-- /.product-price -->
						
					</div><!-- /.product-info -->
							<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div><!-- /.product -->
				
						</div><!-- /.products -->
					</div><!-- /.item -->
					<?php } ?>
				
					
											</div><!-- /.home-owl-carousel -->
								</div><!-- /.product-slider -->
							</div>






					<div class="tab-pane" id="furniture">
								<div class="product-slider">
									<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
					<?php
					$ret=mysqli_query($con,"select * from products where category=9");
					while ($row=mysqli_fetch_array($ret)) 
					{
					?>

												
						<div class="item item-carousel">
							<div class="products">
								
					<div class="product">		
						<div class="product-image">
							<div class="image">
								<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
							
								<img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%" alt=""></a>
							</div>		

															
						</div>
						
					
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
								<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>			</span>
														
												
						</div>
						
					</div>
							<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div>
				
						</div>
					</div>
					<?php } ?>
			
				
										</div>
							</div>
						</div>
					</div>
				</div>
	
		</div>
	<!-- ============================================== SCROLL TABS2 REAL ============================================== -->
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left"> Sản Phẩm Nổi Bật </h3>
				<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
					<li class="active"><a href="#All" data-toggle="tab">Tất Cả</a></li>
					<li><a href="#Nam" data-toggle="tab">Nam</a></li>
					<li><a href="#Nu" data-toggle="tab">Nữ</a></li>
				
				</ul><!-- /.nav-tabs -->
			</div>

			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="All">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
					<?php
					$ret=mysqli_query($con,"SELECT * FROM products ");
					while ($row=mysqli_fetch_array($ret)) 
					{
						# code...


					?>

										
					<div class="item item-carousel">
						<div class="products">
							
					<div class="product">		
					<div class="product-image">
						<div class="image">
							<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
							<img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%" alt=""></a>
						</div><!-- /.image -->			

													
					</div><!-- /.product-image -->
						
					
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
								<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>		</span>
													
												
						</div><!-- /.product-price -->
						
					</div><!-- /.product-info -->
					<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div><!-- /.product -->
			
					</div><!-- /.products -->
					</div><!-- /.item -->
					<?php } ?>

						</div><!-- /.home-owl-carousel -->
								</div><!-- /.product-slider -->
							</div>




				<div class="tab-pane" id="Nam">
						<div class="product-slider">
							<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
					<?php
					$ret=mysqli_query($con,"select * from products where category=10");
					while ($row=mysqli_fetch_array($ret)) 
					{
						# code...


					?>

									
					<div class="item item-carousel">
					<div class="products">
						
					<div class="product">		
					<div class="product-image">
					<div class="image">
						<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
						<img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%" alt=""></a>
					</div><!-- /.image -->			

													
					</div><!-- /.product-image -->
					
				
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
								<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>			</span>
													
												
						</div><!-- /.product-price -->
						
					</div><!-- /.product-info -->
							<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div><!-- /.product -->
				
						</div><!-- /.products -->
					</div><!-- /.item -->
					<?php } ?>
				
					
											</div><!-- /.home-owl-carousel -->
								</div><!-- /.product-slider -->
				</div>

				<div class="tab-pane" id="Nu">
								<div class="product-slider">
									<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
					<?php
					$ret=mysqli_query($con,"select * from products where category=9");
					while ($row=mysqli_fetch_array($ret)) 
					{
					?>

												
						<div class="item item-carousel">
							<div class="products">
								
					<div class="product">		
						<div class="product-image">
							<div class="image">
								<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
							
								<img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%" alt=""></a>
							</div>		

															
						</div>
						
					
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
								<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>			</span>
														
												
						</div>
						
					</div>
							<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div>
				
						</div>
					</div>
					<?php } ?>
			
				
										</div>
							</div>
						</div>
					</div>
				</div>
			

				
				

				<!-- ============================================== TABS ============================================== -->
					<div class="sections prod-slider-small outer-top-small">
						<div class="row">
							<div class="col-md-6">
							<section class="section">
								<h3 class="section-title">Quần Âu</h3>
								<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
				
				<?php
				$ret=mysqli_query($con,"select * from products where category=10 and subCategory=17");
				while ($row=mysqli_fetch_array($ret)) 
				{
				?>



				<div class="item item-carousel">
					<div class="products">
							
				<div class="product">		
					<div class="product-image">
					<div class="image">
						<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%"></a>
					</div><!-- /.image -->			                        		   
				</div><!-- /.product-image -->
					
				
				<div class="product-info text-left">
					<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
					<div class="rating rateit-small"></div>
					<div class="description"></div>

					<div class="product-price">	
						<span class="price">
							<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>			</span>
												
											
					</div>
					
				</div>
						<?php if($row['productAvailability']=='Còn Hàng'){?>
						<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
						<?php } else {?>
								<div class="action" style="color:red"> Hết Hàng</div>
							<?php } ?>
					</div>
					</div>
				</div>
				<?php }?>

				
											</div>
				</section>
										</div>
										<div class="col-md-6">
											<section class="section">
										<h3 class="section-title">Váy </h3>
										<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
				<?php
				$ret=mysqli_query($con,"select * from products where category=9 and subCategory=13");
				while ($row=mysqli_fetch_array($ret)) 
				{
				?>



					<div class="item item-carousel">
						<div class="products">
							
				<div class="product">		
					<div class="product-image">
						<div class="image">
							<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="100%"></a>
						</div><!-- /.image -->			                        		   
					</div><!-- /.product-image -->
						
					
					<div class="product-info text-left">
						<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="description"></div>

						<div class="product-price">	
							<span class="price">
							<?php echo htmlentities($row['productPrice']);?>,000<sup>đ</sup>			</span>
													
												
						</div>
						
					</div>
							<?php if($row['productAvailability']=='Còn Hàng'){?>
							<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Thêm Vào Giỏ Hàng</a></div>
							<?php } else {?>
									<div class="action" style="color:red"> Hết Hàng</div>
								<?php } ?>
						</div>
						</div>
					</div>
				<?php }?>

					
				
												</div>
				

				</div>
				</div>
		</div>
		
		<!-- ============================================== TABS : END ============================================== -->

		



		


</div>
<br>
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