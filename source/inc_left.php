<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">HangSanXuat</h3>
        </div>

        <div class="list-group">
            <?php
            
            require_once './dbHelper.php';
            
            $sql = "select * from HangSanXuat";
            $rs = load($sql);

            while ($row = $rs->fetch_assoc()) {
                $id = $row["MaHangSanXuat"];
                $name = $row["TenHangSanXuat"];
                ?>
                <a class="list-group-item" href="index.php?act=products&id=<?php echo $id; ?>"><?php echo $name; ?></a>
                <?php
            }
            ?>
        </div>
    </div>
        <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">LoaiSanPham</h3>
        </div>

        <div class="list-group">
            <?php
            
            require_once './dbHelper.php';
            
            $sql = "select * from LoaiSanPham";
            $rs = load($sql);

            while ($row = $rs->fetch_assoc()) {
                $id = $row["MaLoaiSanPham"];
                $name = $row["TenLoaiSanPham"];
                ?>
                <a class="list-group-item" href="index.php?act=products&id=<?php echo $id; ?>"><?php echo $name; ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</div>