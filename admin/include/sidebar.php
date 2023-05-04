<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Quản Lý Đơn Hàng
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="todays-orders.php">
											<i class="icon-tasks"></i>
											Đơn Hàng Chưa Xử Lý
  <?php
 
 $result = mysqli_query($con,"SELECT * FROM Orders where orderStatus is null");
$num_rows1 = mysqli_num_rows($result);
{
?>
											<b class="label orange pull-right"><?php echo htmlentities($num_rows1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="pending-orders.php">
											<i class="icon-tasks"></i>
											Đơn Hàng Đang Xử Lý
										<?php	
	$statuss='in Process';									 
$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$statuss' ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="delivered-orders.php">
											<i class="icon-inbox"></i>
											Đơn Hàng Đã Giao
								<?php	
	$status='Delivered';									 
$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="manage-users.php">
									<i class="menu-icon icon-group"></i>
									Quản Lý Khách Hàng
								</a>
							</li>
						</ul>


						<ul class="widget widget-menu unstyled">
                                <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Thể Loại </a></li>
                                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Loại Sản Phẩm</a></li>
                                <li><a href="insert-product.php"><i class="menu-icon icon-paste"></i>Thêm Sản Phẩm</a></li>
                                <li><a href="manage-products.php"><i class="menu-icon icon-table"></i>Quản Lý Sản Phẩm </a></li>
                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>Khách Hàng Đăng Nhập </a></li>
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Đăng Xuất
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
