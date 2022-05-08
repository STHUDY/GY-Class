<?php 
$mysql = json_decode(file_get_contents("./Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo 'Connect failed: '.mysqli_connect_error();
    exit();
}
$sql_set_user="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_set_user = mysqli_query($con,$sql_set_user);
$row = mysqli_fetch_array($sqls_set_user);
if($row["userID"] != $_COOKIE['UserID']){
    setcookie("UserID","",time()-1);
    setcookie("UserName","",time()-1);
    setcookie('UserImg',"",time()-1);
    setcookie("Class","",time()-1);
    setcookie('QQ',"",time()-1);
    setcookie('WeChat',"",time()-1);
    setcookie('Phone',"",time()-1);
    setcookie('Box',"",time()-1);
    setcookie('SelfItroduce',"",time()-1);
    setcookie('AllClass',"",time()-1);
    setcookie('UserPower',"",time()-1);
    echo'<script>window.location.href = "/main"</script>';
    die();
}
if($row["set"] == ""){
    $sql_add_set_default = "UPDATE `user` SET `set`='".base64_encode(file_get_contents("./user/config/user/Default.json"))."' WHERE `userID`='".$_COOKIE['UserID']."'";
    $sqls_add_set_default = mysqli_query($con,$sql_add_set_default);
}
setcookie("UserName",$row['name'],time()+3600*24*30);
setcookie('UserImg',$row['userset'],time()+3600*24*30);
require('./Code/PHP/gy-con-class.php');
$class_name_user = get_class_name($row['classcode']);
if($class_name_user != ""){
    setcookie('Class',base64_encode($class_name_user),time()+3600*24*30);
    $config_load_choose = "./Config/user.json";
    require("./Code/PHP/gy-get-class-number.php");
    require("./Code/PHP/gy-get-power.php");
    require("./Code/PHP/gy-get-introduce.php");
    require("./Code/PHP/gy-con-getinfo.php");
}else{
    $row['set'] = base64_encode(file_get_contents("./user/config/other/Default.json"));
    $config_load_choose = "./Config/other.json";
}
?>