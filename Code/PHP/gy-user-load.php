<?php
$sign_userid = $_POST['sign_userid'];
$sign_userpassword = $_POST['sign_password'];
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$sql_load_user="SELECT * FROM `user` WHERE `userID` = '".$sign_userid."'";
$sqls_load_user = mysqli_query($con,$sql_load_user);
$row = mysqli_fetch_array($sqls_load_user);
if($row["userID"] != $sign_userid){
    echo'<script>window.alert("账号不存在")</script>';
    die();
}
if($row["password"] != md5($sign_userpassword)){
    echo'<script>window.alert("密码错误")</script>';
    die();
}else{
    setcookie('UserID',$row["userID"],time()+3600*24*30,"/");
    echo'<script>top.location.href = "/main"</script>';
    die();
}

?>