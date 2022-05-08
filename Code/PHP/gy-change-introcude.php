<?php 
$self_introduce = $_POST['self_introduce'];
if($self_introduce == ""){
    die();
}
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$self_introduce_data = base64_encode($self_introduce);
$sql_add_user_introduce = "UPDATE `user` SET `self`='".$self_introduce_data."' WHERE `userID`='".$_COOKIE['UserID']."'";
$sqls_add_user_introduce = mysqli_query($con,$sql_add_user_introduce);
echo'<script>top.location.reload()</script>';
?>