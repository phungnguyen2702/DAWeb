<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <i class="fa fa-home"></i>
                14CK4
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <!--            <ul class="nav navbar-nav">
     <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
     <li><a href="#">Link</a></li>
     <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
         <ul class="dropdown-menu">
             <li><a href="#">Action</a></li>
             <li><a href="#">Another action</a></li>
             <li><a href="#">Something else here</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="#">Separated link</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="#">One more separated link</a></li>
         </ul>
     </li>
 </ul> -->
            <form class="navbar-form navbar-left" style="margin-left: 350px">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" style="width: 300px">
                </div>
                <button type="submit" class="btn btn-danger" title="tìm kiếm">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            <ul class="nav navbar-nav navbar-right">

                <?php
                require_once './inc_func.php';
                if (isAuthenticated() == false) {
                    ?>
                    <li><a href="index.php?act=login">Đăng nhập</a></li>
                    <li><a href="index.php?act=register">Đăng ký</a></li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a href="index.php?act=cart">Giỏ hàng có <?php echo cart_sum_items(); ?> sản phẩm!</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["auth_user"]["f_Name"]; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?act=profile">
                                    <i class="fa fa-user"></i>
                                    Xem thông tin cá nhân
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="logout.php">
                                    <i class="fa fa-sign-out"></i>
                                    Thoát
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <img src="imgs/banner.jpg.jpg" class="img-responsive" alt="Image">
</div>
