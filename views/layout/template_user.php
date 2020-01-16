<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/index.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/banner.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/danhmuc.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/sanpham.css';?>">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/slideshow.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/menu.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/footer.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/chonLocSp.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/get_one.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/cart.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/slide_sanpham.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH.'assests/style/login.css';?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="<?php echo PATH.'assests/script/slide_sanpham.js';?>"></script>
    <script src="<?php echo PATH.'assests/script/menu.js';?>"></script>
    <script src="<?php echo PATH.'assests/script/get_one.js';?>"></script>
    <script src="<?php echo PATH.'assests/script/signup.js';?>"></script>

</head>
<body>
    <div>
        <!-- phần header---------------------------------------- -->
        <div class="header container-fluid ">
<!-- ------------------- lien he------------------------------------------ -->
            <div class="lienHe">
                <i class="email far fa-envelope"> E-mail: Nguyenmanh25111999m@gmail.com</i>
				<i class="phone fas fa-mobile-alt"> Phone: 0965729716</i>
            </div>
 <!-- --------------- -------------PHẦN MENU------------------------------------------ -->
            <div class="menu ">
                <sticknav>
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>                        
				      </button>
				      <a class="navbar-brand" href="<?php echo PATH; ?>"><img src="<?php echo PATH.'assests/img/logo.png'; ?>" alt="" width="150px" height="41px"></a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
					      <ul class="nav navbar-nav">
						        <li class="active"><a href="<?php echo PATH; ?>"><i class="fas fa-home"></i> 		Home</a>
						        </li>
						        <?php 
									//khai báo model 'Category'
									require_once("model/category.php");
									$cat = Category::getCategoryParent();
									foreach ($cat as $key => $value) {
										$cat2 = Category::getCategoryCon($value['categoryID']);
								?>
						        <li class="dropdown">
							          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
							          	<i class="fas fa-tshirt"></i><?php echo " ".$value['categoryName']; ?><span class="caret"></span></a>
							          <ul class="dropdown-menu">
							          	<?php
											foreach ($cat2 as $key2 => $value2){
										?>
							            <li>
							            	<a href="<?php echo PATH.'?controller=category&action=getproductbycatid&id='.$value2['categoryID'];?>"><?php echo $value2['categoryName']; ?>
							            		
							            	</a>
							            </li>
							            <?php
							            	}
							            ?>
							          </ul>
						        </li>
						        <?php
									}
								?>
					    	</ul>
					      <ul class="nav navbar-nav navbar-right">
					          	<li>
					          		<div class="search">
								      <form action="<?php echo PATH.'?controller=category&action=getproductbySearch'?>" method="get">
									      <div class="form-group">
									      	<input type="hidden" name="controller" value="category">
											<input type="hidden" name="action" value="getproductbySearch">
										    <input class="text" type="text" placeholder=" Search.." name="search">
										    <button class="btn" type="submit"><i class="fa fa-search"></i>
										    </button>
									      </div>
								      </form>
								    </div>
								</li>
							<?php 
								if (isset($_SESSION['customer2']) && $_SESSION['logged_in2']==true) {
									echo '<li class="dropdown">
									          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i> '.$_SESSION['customer2'].'<span class="caret"></span></a>
									          <ul class="dropdown-menu">
									            <li><a href="'.PATH.'?controller=customer&action=TTcaNhan"><i class="far fa-address-card"></i> TT cá nhân</a></li>
									            <li><a href="'.PATH.'?controller=customer&action=changePass"><i class="fas fa-lock"></i> Đổi mật khẩu</a></li>
									            <li><a href="'.PATH.'?controller=customer&action=signout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
									          </ul>
									        </li>';
								}
								else{
							?>
								<li><a href="<?php echo PATH.'?controller=customer&action=signin'?>"><i class="dangNhap fas fa-user"> Đăng nhập</i></a></li>
							<?php 
								}

							?>
					        
					        <?php
					        	$numberCart=0;
					        	if (isset($_SESSION["cart"])) {
					        		foreach ($_SESSION["cart"] as $key => $value) {
					        			$numberCart ++;
					        		}
					        	}
					        ?>
					        <li><a href="<?php echo PATH.'?controller=cart&action=getcart'?>"><i class="fas fa-shopping-cart"></i> Cart <span class="badge" id="numberCart" ><?php echo $numberCart; ?></span></a></li>
					      </ul>
				    </div>
				  </div>
				</nav>
				</sticknav>
<!-- ----------------------------- END MENU----------------------------------------- -->

            </div>

        </div>
        <!-- -----------------------------------phần main--------------------------- -->
        <div class="main container-fluid">
            <?= @$content ?>
        </div>
        <!-- phần footer--------------------------------------- -->
        <div class="footer container-fluid">
            <div class="thongTin">
                <div class="footer row">
					<div class="footer1 col-md-4">
						<h3><b>ĐỊA CHỈ</b></h3>
						<a href="#"><i class="fa fa-shopping-cart"> Giờ mở cửa: 7am-20pm</i></a><br>
						<a href="#"><i class="fa fa-home"> Địa chỉ: Q.Bắc Từ Liêm, TP.Hà Nội</i></a><br>
						<a href="#"><i class="fa fa-phone"> SĐT: 012345678</i></a><br>
						<a href="#"><i class="fa fa-tty"> Hotline: 012345678</i></a>
					</div>

					<div class="footer2 col-md-4">
						<h3><b>DÀNH CHO NGƯỜI MUA</b></h3>
						<ul>
							<li><a href="#"><i class="fas fa-angle-double-right"> Giải quyết khiếu nại</i></a></li>
							<li><a href="#"><i class="fas fa-angle-double-right"> Hướng dẫn mua hàng</i></a></li>
							<li><a href="#"><i class="fas fa-angle-double-right"> Chính sách đổi trả</i></a></li>
							<li><a href="#"><i class="fas fa-angle-double-right"> Chăm sóc khách hàng</i></a></li>
							
						</ul>
					</div>

					<div class="footer3 col-md-4">
						<h3><b>VỀ CHÚNG TÔI</b></h3>
						<ul>
							<li><a href="#"><i class="fas fa-angle-double-right"> Giới thiệu ABC shop</i></a></li>
							<li><a href="#"><i class="fas fa-angle-double-right"> Quy chế hoạt động</i></a></li>
						</ul>
						<h3><b>KẾT NỐI</b></h3>
						<a href="https://www.facebook.com" target="_blank"><img src="<?php echo PATH.'assests/img/logoFacebook.png'; ?>" width="45px" height="45px"></a>
						<a href="https://id.zalo.me" target="_blank"><img src="<?php echo PATH.'assests/img/logoZalo.png'; ?>" width="50px" height="50px"></a>
					</div>
				</div>
            </div>
            <div class="banQuyen">
                <address class="add">&copy; Bản quyền thuộc về Group-ADML</address>
            </div>
        </div>
    </div>
</body>
</html>