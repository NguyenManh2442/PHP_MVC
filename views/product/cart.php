<div class=" cart-header">
             <div class="cart-name"><h1>| Giỏ Hàng</h1> </div>
    </div>
<div class="container" id="listCart" > 
 <table class="table table-hover table-condensed" id="cartx" > 
  <thead> 
   <tr> 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:10%">Giá</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <tbody>
    <?php
        $tong=0;
        if (isset($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $key => $value) {
    
    ?>
    <tr> 
       <td data-th="Product"> 
          <div class="row"> 
           <div class="col-sm-2 hidden-xs"><img src="<?php echo PATH.'assests/img/'.$value['image'];?>" alt="Sản phẩm 1"  width="100">
           </div> 
           <div class="col-sm-10"> 
            <h4 class="nomargin"><?php echo $value['name'];?></h4> 
            <p>Quần</p> 
           </div> 
          </div> 
       </td> 
       <td data-th="Price"><?php echo $value['gia'].'Đ';?></td> 
         <td data-th="Quantity"><input class="form-control text-center" value="<?php echo $value['num'];?>" type="number" min="1" id="quantity_<?php echo $key; ?>" name="quantity_<?php echo $key; ?>" onchange="updateCart(<?php echo $key; ?>)" >
         </td> 
        <td data-th="Subtotal" class="text-center"><?php echo $tien = $value['gia']*$value['num'];
        ?> Đ </td> 
        <td class="actions" data-th="">
          <a href="javascript:void(0)" onclick="deleteCart(<?php echo $key; ?>)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o">Xóa</i>

          </a>
       </td> 
  </tr> 
  <?php
        $tong+=$tien;
       }
        }
        else{
          echo "Bạn chưa mua hàng";
        }
  ?>
  </tbody>
  <tfoot> 
   <tr> 
    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <td class="hidden-xs text-center"><strong>Tổng : <?php echo $tong;?> Đ</strong>
    </td> 
    <td><a href="#" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
    </td> 
   </tr> 
  </tfoot> 
 </table>
</div>