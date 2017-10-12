<?php
require_once './inc_func.php';

if (isAuthenticated() == false) {
    redirect("index.php?act=login");
}
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Thông tin cá nhân</h3>
        </div>
        <div class="panel-body">
            <?php
                $u = $_SESSION["auth_user"];
                print_r($u);
            ?>
        </div>
    </div>
</div>