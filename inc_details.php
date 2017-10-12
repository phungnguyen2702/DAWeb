<?php
require_once './inc_func.php';
require_once './dbHelper.php';

if (isset($_POST["btnAddToCart"])) {
    $sp = $_GET["id"];
    $slg = $_POST["txtQuantity"];
    setCart($sp, $slg);
    print_r(getCart());
}
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Chi tiết sản phẩm</h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "SELECT s.MaSanPham, s.TenSanPham, s.GiaSanPham, s.SoLuongTon, s.SoLuocXem, s.HinhURL, s.MoTa, h.TenHangSanXuat, l.TenLoaiSanPham FROM SanPham s, HangSanXuat h, LoaiSanPham l WHERE s.BiXoa = 0 AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaSanPham = $id";
                $rs = load($sql);
                if ($rs->num_rows == 0) {
                    echo "KHÔNG CÓ SẢN PHẨM.";
                } else {
                    $row = $rs->fetch_assoc();
                    ?>
                    <div class="row">
                        <div class="col-md-12 caption-lg">
                            <?php echo $row["TenSanPham"]; ?>
                        </div>
                        <div class="col-md-12">
                            <img src="imgs/sp/<?php echo $row["MaSanPham"]; ?>/big.jpg"
                                 title="<?php echo $row["TenSanPham"]; ?>"
                                 alt="<?php echo $row["TenSanPham"]; ?>" />
                        </div>

                        <div class="col-md-12">
                            Giá: <span class="caption-sm"><?php echo number_format($row["GiaSanPham"]); ?></span>
                        </div>
                        <div class="col-md-12 padding">
                            <?php echo $row["MoTa"]; ?>
                        </div>
                    </div>

                    <?php if (isAuthenticated()) {
                        ?>
                        <form class="form-horizontal" id="cartAdd-form" method="post" action="">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <div class="input-group" style="margin-left: 24px;">
                                        <input type="text" id="txtQuantity" name="txtQuantity" class="form-control" placeholder="Slg" value="1" style="width: 50px">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit" name="btnAddToCart">
                                                <i class="fa fa-cart-plus"></i>
                                            </button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
            } else {
                redirect("index.php");
            }
            ?>
        </div>
    </div>
</div>