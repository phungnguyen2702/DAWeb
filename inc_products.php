<?php
require_once './inc_func.php';
require_once './dbHelper.php';

if(isset($_POST["txtProId"])) {
    $sp = $_POST["txtProId"];
    $slg = 1;
    setCart($sp, $slg);
    print_r(getCart());
}

?>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Danh sách sản phẩm</h3>
<!--             <a href="imgs/sp/11/1.jpg" data-lightbox="image-1" data-title="My caption">
    Image #1
</a> -->
        </div>
        <div class="panel-body">
            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "select * from SanPham where MaLoaiSanPham = $id";
                $rs = load($sql);
                if ($rs->num_rows == 0) {
                    echo "KHÔNG CÓ SẢN PHẨM.";
                } else {
                    ?>
                    <div class="row">
                        <form id="f" action="" method="post">
                            <input type="hidden" id="txtProId" name="txtProId" />
                        </form>
                        <?php
                        while ($row = $rs->fetch_assoc()) {
                            ?>
                            <div class="col-sm-6">
                                <div class="thumbnail">
                                    <a href="imgs/sp/<?php echo $row["MaSanPham"]; ?>/small.jpg" data-lightbox="<?php echo $row["MaSanPham"]; ?>" data-title="<?php echo $row["TenSanPham"]; ?>">
                                        <img src="imgs/sp/<?php echo $row["MaSanPham"]; ?>/small.jpg" alt="...">
                                    </a>                                    
                                    <div class="caption">
                                        <h4><?php echo $row["TenSanPham"]; ?></h4>
                                        <h4><?php echo number_format($row["GiaSanPham"]); ?></h4>
                                        <p>
                                        </p>
                                        <p>
                                            <a href="index.php?act=details&id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-primary" role="button">
                                                Chi tiết
                                            </a>
                                            <?php if (isAuthenticated()) { ?>
                                                <a href="#" class="btn btn-success" role="button" onclick="setProId(<?php echo $row["ProID"]; ?>);">
                                                    <i class="fa fa-cart-plus"></i>
                                                    Đặt hàng
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            } else {
                redirect("index.php");
            }
            ?>
        </div>
    </div>
</div>

<?php
$js = <<<JS
<script src="assets/lightbox2/js/lightbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function setProId(id) {
        f.txtProId.value = id;
        f.submit();
    }
</script>
JS;
?>