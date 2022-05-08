<?php
$type=$_GET['type'];
$mysql = json_decode(file_get_contents("./Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo 'Connect failed: '.mysqli_connect_error();
    exit();
}
$sql_get_class_number = "SELECT COUNT(`classcode`) FROM `user` WHERE `classcode`='".$row['classcode']."'";
$sqls_get_class_number = mysqli_query($con,$sql_get_class_number);
$number = mysqli_fetch_array($sqls_get_class_number);
setcookie('AllClass',$number[0],time()+60*60*24*30,'/');
?>