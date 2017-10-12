<?php
require_once './dbHelper.php';
require_once './inc_func.php';

if (isset($_POST["btnLogin"])) {
    $uid = $_POST["txtUID"];
    $pwd = $_POST["txtPWD"];
    
    $enc_pwd = md5($pwd);
    echo $enc_pwd;
    $sql = "SELECT * FROM TaiKhoan WHERE  TenDangNhap = '$uid' AND MatKhau = '$pwd' AND BiXoa=0";
    $rs = load($sql);
    echo $rs->num_rows;
    if ($rs->num_rows == 0) {
        $login_fail = 1;
    } else {

        $_SESSION["auth"] = 1;

        $row = $rs->fetch_assoc();
        $u = array();
        $u["TenDangNhap"] = $row["TenDangNhap"];
        $u["MaTaiKhoan"] = $row["MaTaiKhoan"];
        $u["HoTen"] = $row["HoTen"];
        $u["DiaChi"]=$row["DiaChi"];
        $u["DienThoai"]=$row["DienThoai"];
        $u["Email"] = $row["Email"];
        $u["LoaiTaiKhoan"] = $row["LoaiTaiKhoan"];
        $_SESSION["auth_TaiKhoan"] = $u;

        $remember = isset($_POST["chkRememberMe"]) ? true : false;
        if ($remember) {
            $expire = time() + 7 * 24 * 60 * 60;
            setcookie("auth_TaiKhoan_MaTaiKhoan", $row["MaTaiKhoan"], $expire);
        }

        redirect("index.php");
    }
}
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Đăng nhập</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="" method="post" id="loginForm">

                <?php
                if (isset($login_fail) && $login_fail == 1) {
                    ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span>Đăng nhập thất bại</span>
                    </div>
                    <?php
                }
                ?>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 title">
                        Thông tin đăng nhập
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="txtUID" name="txtUID" placeholder="Tên đăng nhập">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" id="txtPWD" name="txtPWD" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-7">
                                <label style="font-weight: normal">
                                    <input type="checkbox" name="chkRememberMe" /> Ghi nhớ
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary pull-right" name="btnLogin" id="btnLogin">
                                    <i class="fa fa-check"></i> Đăng nhập
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>