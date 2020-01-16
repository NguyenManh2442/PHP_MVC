<div class="row">  
    <div class="col-md-4"> </div>

    <div class="col-md-4">  
        <form action="<?php echo PATH.'?controller=admin&action=login' ?>" method="post" onsubmit="return ValidateForm2();">
            <div><h3>ĐĂNG NHẬP TÀI KHOẢN</h3></div>
            <label>Nếu bạn đã có tài khoản, vui lòng đăng nhập:</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Tên đăng nhập"><br>
            <span class="error text-danger" id="error_user"></span>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu">
            <span class="error text-danger" id="error_pass"></span>
            <input type="submit" name="dangnhap" id="" class="btn btn-info" value="Đăng nhập"><br>
            
            <a href="<?php echo PATH.'?controller=customer&action=signup'?>">Bạn chưa có tài khoản? Đăng ký tại đây!</a><br><br>
            <a href="forget-password.php">Bạn quên mật khẩu?</a>
        </form>
    </div>

    <div class="col-md-4"> </div>
</div>