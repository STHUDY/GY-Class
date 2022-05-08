<?php 
$user_name = $_POST['user_name'];
if($user_name == ""){
    die();
}
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$sql = "UPDATE `user` SET `name`='".base64_encode($user_name)."' WHERE `userID`='".$_COOKIE['UserID']."'";
$sqls = mysqli_query($con,$sql);
echo'<script>top.location.reload()</script>';
?>