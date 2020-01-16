
	<div class="main container-fluid">
            <div class="row">
	            <div class="col-md-8 anh_one">
	               <img src="<?php echo PATH.'assests/img/'.$data['image'];?>">
	            </div>

	            <div class="col-md-4 main-Sp">
	                <h1><?php echo $data['productName'];?></h1>
	                <span class="price"><?php echo $data['unitPrice'].'Đ';?></span>
	            </div>
	            <div class="infor-prd col-md-4"><span><?php echo $data['description']?></span><br>
	            </div>
	            
	            <div class="col-md-4">
	                <p class="cl-gray">CHỌN SỐ LƯỢNG: </p>
	                <p class="product-qty">
	                	<input class="btn btn-success" type="button" value="-" onclick="giam()">
	                    <input class="hop" id="sl" value="1" type="text"> 
	                    <input class="btn btn-info" type="button" value="+" onclick="tang()">
	                </p>
	            </div>
	            <div class="col-md-4">
	               <button class="btn btn-danger btn-lg" 
	               <?php 
		               if (isset($_SESSION['customer2']) && $_SESSION['logged_in2']==true) {
		               		echo 'onclick="addCart('.$data['id'].')"';
	               	}else{
	               			echo 'onclick="batDangNhap()"';
	               		}
	               ?>
	               ><span class="fa fa-shopping-cart"></span> Thêm vào giỏ hàng
	                </button>
	            </div>
            </div>
    </div>
    <div class="slideSanPham">
                
    </div>
    <!-- -------------------------------THÔNG BÁO ĐÃ THÊM THÀNH CÔNG VÀO GIỎ HÀNG-------------- -->
   <div class="modal fade" tabindex="-1" id="showCart" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel" style="text-align: center; font-size: 30px; color: red;"><i class="fas fa-check"></i> Sản phẩm đã được thêm vào giỏ</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6" style="text-align: center;">
          	<button type="button" class="btn btn-warning" data-dismiss="modal">Tiếp tục mua</button></div>
          <div class="col-md-6" style="text-align: center;">
          	<a href="<?php echo PATH.'?controller=cart&action=getcart'?>" type="button" class="btn btn-primary">Vào giỏ hàng</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -------------------------------END-- THÔNG BÁO ĐÃ THÊM THÀNH CÔNG VÀO GIỎ HÀNG------------ -->

<!-- ----------------------------------THÔNG BÁO BẮT BUỘC ĐĂNG NHẬP-------------------------- -->
<div class="modal fade" tabindex="-1" id="showDangNhap" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel" style="text-align: center; font-size: 30px; color: blue;">Vui lòng đăng nhập <i class="fas fa-sign-in-alt"></i></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6" style="text-align: center;">
          	<a href="<?php echo PATH.'?controller=customer&action=signup'?>" type="button" class="btn btn-success">Đăng ký</a></div>
          <div class="col-md-6" style="text-align: center;">
          	<a href="<?php echo PATH.'?controller=customer&action=signin'?>" type="button" class="btn btn-primary">Đăng nhập</a></div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ---------------------------------END-THÔNG BÁO BẮT BUỘC ĐĂNG NHẬP-------------------------- -->

