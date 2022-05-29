<?php
$reg_userid = $_POST['reg_userid'];
$reg_password = $_POST['reg_password'];
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$sql_rega_user="SELECT * FROM `user` WHERE `userID` = '".$reg_userid."'";
$sqls_rega_user = mysqli_query($con,$sql_rega_user);
$row = mysqli_fetch_array($sqls_rega_user);
if($row["userID"] == $reg_userid){
    echo'<script>window.alert("此账号已被注册")</script>';
    die();
}
$path_user_img = base64_encode('./Info/IMG/USERICO/Default.png');
$sql_user_reg="INSERT INTO `user` (`userID`, `password`, `name`, `set`, `userset` , `listid`) VALUES ('".$reg_userid."', '".md5($reg_password)."', '".base64_encode(strval(rand(545465,921392989)))."', '".base64_encode(file_get_contents("../../user/config/user/Default.json"))."', '".$path_user_img."', '".time()."')";
$sqls_user_reg = mysqli_query($con,$sql_user_reg);
setcookie('UserID',$reg_userid,time()+3600*24*30,"/");
echo'<script>top.location.href = "/main"</script>';
?>