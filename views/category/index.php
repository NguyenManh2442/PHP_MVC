<?php
	$pro = $data['product'];
	// echo "<pre>";
	// print_r($pro);
?>
<div class="main container-fluid">
            <div class="row">
            <div class="danhMuc col-md-2">
                <div class="custom-control custom-checkbox mb-3">
				    <div class="boloc">BỘ LỌC TÌM KIẾM</div>
				    <div class="form-boloc">
				    <form>
				    <input type="reset" class="btn btn-info" value="Xóa hết"> <br><br>
				    <label style="font-size: 20px; color: #1a9cb7;">Lựa chọn sắp xếp:</label>
				    <select class="form-control sapxep-gia" id="sapxep">
				    <option value="">Tùy chọn</option>
				    <option value="1">Giá tăng dần</option>
				    <option value="2">Giá giảm dần</option>
				    </select>
				    <input type="checkbox" id="fruit1" name="fruit-1" value="Apple">
				    <label for="fruit1">Mới nhất</label>
				    <input type="checkbox" id="fruit2" name="fruit-2" value="Banana">
				    <label for="fruit2">Bán chạy</label><br>
				    <label style="font-size: 20px; color: #1a9cb7;">Thương hiệu:</label>
				    <input type="checkbox" id="fruit3" name="fruit-3" value="Cherry">
				    <label for="fruit3">Nike</label>
				    <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
				    <label for="fruit4">Adidas</label>
				    <input type="checkbox" id="fruit5" name="fruit-5" value="Strawberry">
				    <label for="fruit5">Converse</label>
				    </form>
				    </div>
				</div>
            </div>
            <div class="sanPham col-md-9">
                <div class="text-dexuat"><h1>___________Sản phẩm bạn cần___________</h1></div>
				<div class="row sanPham1" id="broad">
					<?php 
						foreach ($product as $key => $value) {
					?>
				    <div class="item1">
				        <div class="col-xs-12 col-sm-6 col-md-2 hang">
				        <a href="<?php echo PATH.'?controller=product&action=detail&id='.$value['id'];?>" class="chitiet">
				        	<img src="<?php echo PATH.'assests/img/'.$value['image'];?>" class="img-responsive center-block">
					        
					        <h4 class="text-center"><?php echo $value['productName'];?></h4>

					        <h5 class="text-center" style="color:red;">
					        	<?php echo $value['unitPrice'].'.Đ';?></h5>
					        <h6 class="text-center"></h6>
				    	</a>
				        </div>
				    </div>
				    <?php
				    	$lastid = $value["id"];
				    	$menuId = $value["categoryID"];
				    	}
				    ?>
				</div>
            </div>
            </div>
            <div>
            <button class="btn btn-info load-more" id="btnLoad" data-id="<?php echo $lastid; ?>" data-mi="<?php echo $menuId; ?>" >Xem thêm...</button>
            </div>
        </div>
    <script src="<?php echo PATH.'assests/script/loadMore.js';?>"></script>