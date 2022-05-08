<?php
$mysql = json_decode(file_get_contents("./Config/mysql.json"),true);

$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
    exit();
}
$sql_get_info="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_get_info = mysqli_query($con,$sql_get_info);
$row = mysqli_fetch_array($sqls_get_info);

if($row['info'] == ""){
    include("./Apis/Code/Rand.php");
    $temp['qq'] = Randenc('未设置','encode');
    $temp['wechat'] = Randenc('未设置','encode');
    $temp['phone'] = Randenc('未设置','encode');
    $temp['box'] = Randenc('未设置','encode');
    $temp['qqimg'] = Randenc('未设置','encode');
    $info_data = base64_encode(json_encode($temp));
    $sql_add_user_info = "UPDATE `user` SET `info`='".$info_data."' WHERE `userID`='".$_COOKIE['UserID']."'";
    $sqls_add_user_info = mysqli_query($con,$sql_add_user_info);
}else{
    $info_data = $row['info'];
}

$info_user = json_decode(base64_decode($info_data),true);

setcookie('QQ',$info_user['qq'],time()+60*24*60*30);
setcookie('WeChat',$info_user['wechat'],time()+60*24*60*30);
setcookie('Phone',$info_user['phone'],time()+60*24*60*30);
setcookie('Box',$info_user['box'],time()+60*24*60*30);
setcookie('QQImg',$info_user['qqimg'],time()+60*24*60*30);
?>