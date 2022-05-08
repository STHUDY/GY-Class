<?php
$class_code = $_POST['class_code'];
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
require("./gy-con-class.php");
$class_name = get_class_name_two($class_code);
if($class_name == ""){
    echo '<script>window.alert("班级邀请码:'.$class_code.'不正确")</script>';
    die();
}
$sql_user_jion_class_code = "UPDATE `user` SET `classcode`='".$class_code."' WHERE `userID`='".$_COOKIE['UserID']."'";
mysqli_query($con,$sql_user_jion_class_code);
echo'<script>top.location.href = "/main"</script>';
?>