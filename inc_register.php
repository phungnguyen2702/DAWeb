<?php
require_once './dbHelper.php';
require_once './inc_func.php';

if (isset($_POST["btnRegister"])) {

    //
    // kiểm tra captcha

    if (empty($_SESSION['captcha']) || trim(strtolower($_POST['txtCaptcha'])) != $_SESSION['captcha']) {
        echo "WRONG CAPTCHA";
    } else {
        $uid = $_POST["txtUID"];
        $pwd = $_POST["txtPWD"];
        $enc_pwd = md5($pwd);

        $HoTen = $_POST["txtHoTen"];
        $diachi=$_POST["txtDiaChi"];
        $dienthoai=$_POST["txtDienThoai"];
        $email = $_POST["txtEmail"];\
		
        $sql = "insert into TaiKhoan(TenDangNhap, MatKhau, HoTen,DiaChi,DienThoai,Email,BiXoa,LoaiTaiKhoan) values('$uid', '$enc_pwd', '$HoTen','$diachi','$dienthoai','$email',0,  0)";

        $id = save($sql, 1);
        echo $id;
    }
}
?>


<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Đăng ký người dùng</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post" id="registerForm" onsubmit="return validate();">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span>Error</span>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 title">
                        Thông tin đăng nhập
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="txtUID" placeholder="Tên đăng nhập">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="txtPWD" placeholder="Mật khẩu">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="txtConfirmPWD" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 title">
                        Thông tin cá nhân
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="txtHoTen" placeholder="Ho Ten">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">                                                
                                <input type="text" class="form-control" name="txtDiaChi" placeholder="Dia Chi">
                            </div>
                            <div class="col-sm-6">                                                
                                <input type="text" class="form-control" name="txtDienThoai" placeholder="Dien Thoai">
                            </div>

                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="txtEmail" placeholder="Email">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <img onclick="this.src = 'cool-php-captcha-0.3.1/captcha.php?' + Math.random();"  style="cursor: pointer" id="captchaImg" src="cool-php-captcha-0.3.1/captcha.php" />
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtCaptcha" name="txtCaptcha" placeholder="Captcha">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success pull-right" name="btnRegister">
                                    <i class="fa fa-check"></i> Đăng ký
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$js = <<<JS
<script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function validate() {
        //
        // sinh viên tự cài đặt hàm kiểm tra form
        
        return true;
    }
    
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-3d',
        autoclose: true,
    });
</script>
JS;
?>