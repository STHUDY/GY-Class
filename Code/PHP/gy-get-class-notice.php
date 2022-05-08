<?php
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo 'Connect failed: '.mysqli_connect_error();
    exit();
}

$sql_set_user="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_set_user = mysqli_query($con,$sql_set_user);
$rows = mysqli_fetch_array($sqls_set_user);

$sql_get_power="SELECT * FROM `class` WHERE `code` = '".$rows['classcode']."'";
$sqls_get_power = mysqli_query($con,$sql_get_power);
$row = mysqli_fetch_array($sqls_get_power);
$notice = base64_decode($row['notice']);
echo $notice;
?>