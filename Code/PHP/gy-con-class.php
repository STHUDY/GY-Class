<?php
function get_class_name($code){
    $mysql = json_decode(file_get_contents("./Config/mysql.json"),true);
    $con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
    if (mysqli_connect_errno()) {
        echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
        exit();
    }
    $sql = "SELECT * FROM `class` WHERE `code` = '".$code."'";
    $sqls = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($sqls);
    return $row['class'];
}
function get_class_name_two($code){
    $mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);
    $con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
    if (mysqli_connect_errno()) {
        echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
        exit();
    }
    $sql = "SELECT * FROM `class` WHERE `code` = '".$code."'";
    $sqls = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($sqls);
    return $row['class'];
}
?>