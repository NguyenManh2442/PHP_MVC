<?php

  $product = $data['p'];

?>
<div style="text-align: right;">
    <a href="<?php echo PATH.'?controller=admin&action=addProduct';?>" class="btn btn-info">Thêm mới sản phẩm</a>
</div>
<div class="container"> 
 <table class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:15%">Giá</th> 
    <th style="width:15%">Số lượng có</th> 
    <!-- <th style="width:22%" class="text-center">Thành tiền</th>  -->
    <th style="width:20%"> </th> 
   </tr> 
  </thead> 
  <?php 
    foreach ($product as $key => $value) {
  ?>
  <tbody><tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="<?php echo PATH.'assests/img/'.$value['image'];?>" alt="Sản phẩm 1"  width="100">
     </div> 
     <div class="col-sm-10" style="padding-left: 35px;"> 
      <h4 class="nomargin"><?php echo $value['productName'];?></h4> 
      <p><?php echo $value['description'];?></p> 
     </div> 
    </div> 
   </td> 
   <td data-th="Price"><?php echo $value['unitPrice'].' VNĐ';?></td> 
   <td data-th="Quantity"><?php echo $value['quantity'];?></td> 

   <td class="actions" data-th="">
    <a href="<?php echo PATH.'?controller=admin&action=updateProduct&id='.$value['id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit">Sửa</i>
    </a> 
    <a href="<?php echo PATH.'?controller=admin&action=deleteProduct&id='.$value['id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o">Xóa</i>
    </a>
   </td> 
  </tr> 
  </tbody> 
    <?php
      }
    ?>
 </table>
</div>
<div style="text-align: center;">
    <a href="#" class="btn btn-warning">Xem thêm</a>
</div>