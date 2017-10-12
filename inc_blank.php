<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">San Phẩn Theo số lượng bán</h3>
        </div>
        <div class="panel-body">
            <?php
					$sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuongBan DESC LIMIT 0, 10";
/*					$result = DataProvider::ExecuteQuery($sql);
					while($row = mysqli_fetch_array($result))*/
					$rs = load($sql);
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
                                                <a href="#" class="btn btn-success" role="button" onclick="setProId(<?php echo $row["MaSanPham"]; ?>);">
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
    </div>
     <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">San Phẩn Xem Nhiều</h3>
        </div>
        <div class="panel-body">
            <?php
					$sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuocXem DESC LIMIT 0, 10";
/*					$result = DataProvider::ExecuteQuery($sql);
					while($row = mysqli_fetch_array($result))*/
					$rs = load($sql);
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
                                                <a href="#" class="btn btn-success" role="button" onclick="setProId(<?php echo $row["MaSanPham"]; ?>);">
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
    </div>
</div>