

<!-- ------------------------------------SLIDESHOW----------------------- -------------->
			<?php
				
				require_once("model/products.php");
				$data = Product::getSlide();
			?>
            <div class="slideshow">
               <div class="slider-area">
				    <div id="carousel-example-generic" class="carousel slide sua" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <?php
				        $i=0;
				        if(count($data)){
				          foreach ($data as $value) {
				            if($i==0){
				              echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
				                $i++;
				            }
				            else{
				              echo '<li data-target="#carousel-example-generic" data-slide-to="1"></li>';
				              $i++;
				            }
				          }
				        }
				    ?>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				      <?php
				        $a=0;
				        if(count($data)){
				          foreach ($data as $value) {
				            if($a==0){
				              echo '<div class="item active">
				                    <img src="assests/img/'.$value['image'].'" alt="1">
				                    <div class="carousel-caption">
				                      <h2>'.$value['description_1'].'</h2>
				                      <h3>'.$value['description_2'].'</h3>
				                    </div>
				                  </div>';
				                $a++;
				            }
				            else{
				              echo '<div class="item">
				                  <img src="assests/img/'.$value['image'].'" alt="2">
				                  <div class="carousel-caption">
				                    <h2>'.$value['description_1'].'</h2>
				                    <h3>'.$value['description_2'].'</h3>
				                  </div>
				                </div>';
				              $a++;
				            }
				          }
				        }
				    ?>
				    
				  </div>

				  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		
<!-- --------------------------------------------end slide----------------------- -->
<div class="row">
            	<!-- -----------------------------DANH MỤC-------------------- -->
            <div class="danhMuc col-md-1">

            </div>
            <!-- -------------------------------------END DANH MỤC----------------------- -->
            <div class="sanPham col-md-10">
          
               <div class="text-dexuat"><h1>_______Đề xuất cho bạn_______</h1> </div>
				<div class="row sanPham1">
						<?php 
							$product = Product::getProductDexuat();
							foreach ($product as $key => $value) {
						?>
				        <div class="item1">
				            <div class="col-xs-12 col-sm-6 col-md-2 hang">
				              <a href="<?php echo PATH.'?controller=product&action=detail&id='.$value['id'];?>" class="chitiet"><img src="<?php echo PATH.'assests/img/'.$value['image'];?>" class="img-responsive center-block">
				              <h4 class="text-center"><?php echo $value['productName'];?></h4>
				              <h5 class="text-center" style="color:red;"><?php echo $value['unitPrice'].'.Đ';?></h5>
				              <h6 class="text-center"></h6></a>
				            </div>
					    </div>
					    <?php
							}
						?>
					    <a href="#" class="btn btn-info xemthem">Xem thêm...</a>
				</div>
            </div>
            </div>
            <!-- -------------------------------------SLIDE SẢN PHẨM----------------------- -->
            <?php
				$data = Product::getSlideProduct();
			?>
            <div class="slideSanPham">
               <div class="container-fluid">
				    <div class="text-sp-slide"><h1>_______Bộ sưu tập mới_______</h1></div>
				    <div class="row">
				      <div class="col-xs-12 col-sm-12 col-md-12">
				        <div class="carousel carousel-showmanymoveone slide" id="itemslider">
				          <div class="carousel-inner">
				   				<?php
							        $a=0;
							        if(count($data)){
							          foreach ($data as $value) {
							          // 	echo "<pre>";
							          // 	print_r($data);
							            if($a==0){
							              echo '<div class="item active">
									              <div class="col-xs-12 col-sm-6 col-md-2">
									                <a href="'.PATH.'?controller=product&action=detail&id='.$value['id'].'">
									                <img src="'.PATH.'assests/img/'.$value['image'].'" class="img-responsive center-block">

									                <h4 class="text-center">'.$value['productName'].'</h4>
									                <h5 class="text-center" style="color:red;">'.$value['unitPrice'].'.Đ'.'</h5></a>
									              </div>
									            </div>';
							                $a++;
							            }
							            else{
							              echo '<div class="item">
									              <div class="col-xs-12 col-sm-6 col-md-2">
									                <a href="'.PATH.'?controller=product&action=detail&id='.$value['id'].'"><img src="'.PATH.'assests/img/'.$value['image'].'" class="img-responsive center-block">
									                <h4 class="text-center">'.$value['productName'].'</h4>
									                <h5 class="text-center" style="color:red;">'.$value['unitPrice'].'.Đ'.'</h5></a>
									              </div>
									            </div>';
							              $a++;
							            }
							          }
							        }
							    ?>
				            
				          </div>
				  <!-- left,right control -->
				          <div id="slider-control">
				          <a class="left carousel-control" href="#itemslider" role="button" data-slide="prev">
				            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				        </a>
				        <a class="right carousel-control" href="#itemslider" role="button" data-slide="next">
				            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				        </a>
				        </div>
				        </div>
				      </div>
				    </div>
  				</div>
            </div>
            <!-- -------------------------------------END SLIDE SẢN PHẨM----------------------- -->