<?php

define("SERVER", "localhost");
define("DB", "quanlysanpham");
define("UID", "root");
define("PWD", "");

function load($sql) {
    $cn = new mysqli(SERVER, UID, PWD, DB);
    if ($cn->connect_errno) {
        die("Error");
    }

    $cn->query("set names 'utf8'");

    $rs = $cn->query($sql);
    return $rs;
}

function save($sql, $type) { // type: 0 => insert, type: 1 => delete/update
    $cn = new mysqli(SERVER, UID, PWD, DB);
    if ($cn->connect_errno) {
        die("Error");
    }

    $cn->query("set names 'utf8'");
    $cn->query($sql);

    if ($type == 1) {
        return $cn->affected_rows;
    }
    
    return $cn->insert_id;
}
