<?php
// echo "<pre>";
// print_r($data);
foreach ($data as $key => $value) {

?>
<div class="row">
        <div class="col-md-4">
               
        </div>
        <div class="col-md-4 suatt">
            <form action="<?php echo PATH.'?controller=customer&action=suaTTcaNhan'; ?>" method="post" onsubmit="return ValidateForm(); ">
                    <div><h3>HỒ SƠ CỦA : <?php echo $value['username'];?></h3></div><br>
                    <label>Quản lý thông tin hồ sơ để bảo mật tài khoản</label><br><br>
 <!-- ----------------------------------------------------------- -->                   
                    <label>User name: </label><input type="text" class="form-control" name="username" id="username"  value="<?php echo $value['username'];?>" >
                    <span class="error text-danger" id="error_name"></span><br>

<!-- ----------------------------------------------------------- -->
                    <label>Họ và tên: </label><input type="text" class="form-control" name="fullName" id="fullName" placeholder="VD: Nguyễn Văn A" value="<?php echo $value['fullName'];?>" >
                    <span class="error text-danger" id="error_name"></span><br>
<!-- ----------------------------------------------------------- -->
                    <label>Số điện thoại: </label><input type="text" class="form-control" name="phone" id="phone" placeholder="VD: 0123456789" value="<?php echo $value['phone'];?>">
                    <span class="error text-danger" id="error_phone"></span><br>
<!-- ----------------------------------------------------------- -->
                    <label>Địa chỉ: </label><input type="text" class="form-control" name="address" id="address" placeholder="Số nhà - Xóm - Xã,Phường - Quận huyện - Tỉnh thành phố" value="<?php echo $value['address'];?>">
                    <span class="error text-danger" id="error_address"></span><br>
<!-- ----------------------------------------------------------- -->
                    <label>Ngày sinh: </label><input type="text" class="form-control" name="birthDay" id="birthDay" placeholder="VD: 1999-11-25" value="<?php echo $value['birthDate'];?>">
                        <span class="error text-danger" id="error_birth"></span><br>
<!-- ----------------------------------------------------------- -->
                    <input type="submit" name="btnLuu" id="" class="btn btn-info" value="Lưu"><br><br>
                </form>
        </div>
        <div class="col-md-4">
                
        </div>
</div>
<?php }?>