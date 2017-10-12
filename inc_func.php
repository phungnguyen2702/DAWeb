<?php
ob_start();
require_once './dbHelper.php';

function redirect($url) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $url");
}

//function isAuthenticated() {
//    if (!isset($_SESSION["auth"]) || $_SESSION["auth"] == 0) {
//        return false;
//    }
//    
//    return true;
//}

function isAuthenticated() {

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == 1) {
        return true;
    }

    if (isset($_COOKIE["auth_TaiKhoan_MaTaiKhoan"])) {
        $id = $_COOKIE["auth_TaiKhoan_MaTaiKhoan"];

        //
        // tái tạo thông tin cho session

        $sql = "select * from TaiKhoan where MaTaiKhoan = $id";
        $rs = load($sql);
        if ($rs->num_rows == 0) {
            return false;
        }

        $row = $rs->fetch_assoc();

        $u = array();
        $uid = $_POST["txtUID"];
        $pwd = $_POST["txtPWD"];
        $enc_pwd = md5($pwd);

        $HoTen = $_POST["txtHoTen"];
        $diachi=$_POST["txtDiaChi"];
        $dienthoai=$_POST["txtDienThoai"];
        $email = $_POST["txtEmail"];

        $_SESSION["auth"] = 1;
        $_SESSION["auth_TaiKhoan"] = $u;

        return true;
    }

    return false;
}

function getCart() {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    return $_SESSION["cart"];
}

function setCart($id, $q) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    if (array_key_exists($id, $_SESSION["cart"])) {
        $_SESSION["cart"][$id] += $q;
    } else {
        $_SESSION["cart"][$id] = $q;
    }
}

function cart_sum_items() {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $ret = 0;
    foreach ($_SESSION["cart"] as $id => $quantity) {
        $ret += $quantity;
    }

    return $ret;
}

function remove_cart_item($id) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    foreach ($_SESSION["cart"] as $proId => $quantity) {
        if ($proId == $id) {
            unset($_SESSION["cart"][$id]);
            return;
        }
    }
}

function update_cart_item($id, $q) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    foreach ($_SESSION["cart"] as $proId => $quantity) {
        if ($proId == $id) {
            $_SESSION["cart"][$id] = $q;
            return;
        }
    }
}
