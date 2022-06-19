<?php
$send_message = $_POST['send_message'];
if(str_replace(" ","",$send_message) == ""){
    die();
}
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
    echo 'Connect failed: '.mysqli_connect_error();
    exit();
}

$sql_set_user="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_set_user = mysqli_query($con,$sql_set_user);
$rows = mysqli_fetch_array($sqls_set_user);

$sql_get_message="SELECT * FROM `class` WHERE `code` = '".$rows['classcode']."'";
$sqls_get_message = mysqli_query($con,$sql_get_message);
$row = mysqli_fetch_array($sqls_get_message);
$message = base64_decode($row['message']);
$data = json_decode($message,true);
if($message == ""){
    $number = "m0";
}else {
    $number = 'm'.strval(count($data));
}
$data[$number] = '['.$_COOKIE['UserID'].']:'.'{[/\/\?:;'.base64_decode($rows['name']).';:?\/\/]}'.$send_message.":[".$_COOKIE['SendUser']."]";
$data2 = base64_encode(json_encode($data,JSON_UNESCAPED_UNICODE));
$sql_add_user_send_message = "UPDATE `class` SET `message`='".$data2."' WHERE `code`='".$rows['classcode']."'";
$result = mysqli_query($con,$sql_add_user_send_message)
?>