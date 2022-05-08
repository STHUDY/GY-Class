<?php 
$mysql = json_decode(file_get_contents("./Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$sql_get_self="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_get_self = mysqli_query($con,$sql_get_self);
$row = mysqli_fetch_array($sqls_get_self);

if($row['self'] == ""){
    $self_data = base64_encode("无介绍");
    $sql_add_user_self = "UPDATE `user` SET `self`='".$self_data."' WHERE `userID`='".$_COOKIE['UserID']."'";
    $sqls_add_user_self = mysqli_query($con,$sql_add_user_self);
}else {
    $self_data = $row['self'];
}
setcookie('SelfItroduce',$self_data,time()+60*24*60*30);

?>