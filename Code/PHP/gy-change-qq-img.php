<?php
$qqimg = $_POST['QQImg'];
if($qqimg == ""){
    die();
}
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);
include("../../Apis/Code/Rand.php");
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$sql_get_info="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_get_info = mysqli_query($con,$sql_get_info);
$row = mysqli_fetch_array($sqls_get_info);
$info_user = json_decode(base64_decode($row['info']),true);
$info_user['qqimg'] = Randenc2($qqimg,'encode');
$info_data = base64_encode(json_encode($info_user));
$sql_add_user_info = "UPDATE `user` SET `info`='".$info_data."' WHERE `userID`='".$_COOKIE['UserID']."'";
$sqls_add_user_info = mysqli_query($con,$sql_add_user_info);

$qqimg_path = "http://q4.qlogo.cn/g?b=qq&nk=".$qqimg."&s=140";

$sql_add_change_img = "UPDATE `user` SET `userset`='".base64_encode($qqimg_path)."' WHERE `userID`='".$_COOKIE['UserID']."'";
$sqls_add_change_img = mysqli_query($con,$sql_add_change_img);

    echo'<script>top.location.reload()</script>';
?>