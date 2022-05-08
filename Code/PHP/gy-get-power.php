<?php
$mysql = json_decode(file_get_contents("./Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo 'Connect failed: '.mysqli_connect_error();
    exit();
}
$sql_get_power="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_get_power = mysqli_query($con,$sql_get_power);
$row = mysqli_fetch_array($sqls_get_power);

setcookie('UserPower',$row['power'],time()+3600*24*30);
?>