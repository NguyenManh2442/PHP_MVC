<div class="row">
    <div class="col-md-2">
               
    </div>
    <div class="col-md-4 dangnhap">
        <form action="<?php echo PATH.'?controller=customer&action=proccess_signin' ?>" method="post" onsubmit="return ValidateForm2();">
            <div><h3>ĐĂNG NHẬP TÀI KHOẢN</h3></div><br>
            <label>Nếu bạn đã có tài khoản, vui lòng đăng nhập:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Tên đăng nhập">
            <span class="error text-danger" id="error_user"></span><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu">
            <span class="error text-danger" id="error_pass"></span><br>
            <input type="submit" name="signin" id="" class="btn btn-info" value="Đăng nhập"><br><br>
            <!-- ĐĂNG NHẬP VỚI FACEBOOK---------------------------- -->
            <?php
                require_once('Facebook/autoload.php');


                $fb = new Facebook\Facebook([
                    'app_id' => '2703555089871471', // Replace {app-id} with your app id
                    'app_secret' => 'f0b54a076206b146d8de5f30bbf148e9',
                    'default_graph_version' => 'v4.0'
                ]);

                $helper = $fb->getRedirectLoginHelper();
                $permissions = ['email']; // Optional permissions
                $loginUrl = $helper->getLoginUrl('https://localhost/php0519E/PRJ_Web_PHP/?controller=customer&action=fbCallback',$permissions);

            ?>
               <!-- END ĐĂNG NHẬP VỚI FACEBOOK---------------------------- -->

            <a href="<?php echo $loginUrl; ?>"><img src="<?php echo PATH.'assests/img/fb_login.png'; ?>" alt='facebook login' title="Facebook Login" height="50" width="250"/></a><br><br>
            <a href="<?php echo PATH.'?controller=customer&action=signup'?>">Bạn chưa có tài khoản? Đăng ký tại đây!</a><br><br>
            <a href="forget-password.php">Bạn quên mật khẩu?</a>
        </form>
    </div>
    <div class="col-md-4 text-dangkyTv">
        <div><h3>ĐĂNG KÝ THÀNH VIÊN</h3></div><br>
        <div><label> Những lợi ích khi đăng ký thành viên:</label></div>
        <div><i class="far fa-check-square"></i> Quản lý và kiểm tra trạng thái đơn hàng thật dễ dàng</div><br>
        <div><i class="far fa-check-square"></i> Quản lý điểm thẻ tích lũy khi mua hàng</div><br>
        <div><i class="far fa-check-square"></i> Quản lý những sản phẩm yêu thích đã lưu lại</div><br>
        <div> Còn chờ gì nữa! Bạn hãy tạo ngay 1 tài khoản dễ dàng chỉ trong vài phút</div><br>
        <a href="<?php echo PATH.'?controller=customer&action=signup'?>" class="btn btn-danger" >Đăng ký ngay</a>
    </div>
    <div class="col-md-2">
                
    </div>
</div>
<script src="<?php echo PATH.'assests/script/signin.js';?>"></script>