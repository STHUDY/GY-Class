<?php 
$phone = $_POST['Phone'];
if($phone == ""){
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
$info_user['phone'] = Randenc2($phone,'encode');
$info_data = base64_encode(json_encode($info_user));
$sql_add_user_info = "UPDATE `user` SET `info`='".$info_data."' WHERE `userID`='".$_COOKIE['UserID']."'";
    $sqls_add_user_info = mysqli_query($con,$sql_add_user_info);
    echo'<script>top.location.reload()</script>';
?>