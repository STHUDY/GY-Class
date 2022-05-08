<?php
$class_notice = $str = str_replace(PHP_EOL, '<br>', $_POST['class_notice']);
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}

$sql_set_user="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_set_user = mysqli_query($con,$sql_set_user);
$row = mysqli_fetch_array($sqls_set_user);

$data = base64_encode($class_notice);
$sql_add_class_code = "UPDATE `class` SET `notice`='".$data."' WHERE `code`='".$row['classcode']."'";
$sqls_add_class_code = mysqli_query($con,$sql_add_class_code);
echo'<script>top.location.reload()</script>';
?>