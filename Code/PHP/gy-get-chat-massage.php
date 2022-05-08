<?php
$number = $_GET['number'];
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
if($message == ""){
    die();
}
$data = json_decode($message,true);
if(isset($data['m'.$number]) == false){
    die();
}
$data1 = $data['m'.$number];
$first = stripos($data1,']:');
$first_two =stripos($data1,']}');
$end = strripos($data1,':[');
$user_send = substr($data1,1,$first - 1);
$send_user =substr($data1,$end + 2,strlen($data1) - $end - 3);
$send_message = substr($data1,$first_two + 2,$end - $first_two - 2);
$name_first = stripos($data1,'{[/\/\?:;');
$send_user_name = substr($data1,$name_first + 9,strripos($data1,';:?\/\/]}') - $name_first - 9);

$data2[1] = $user_send;
$data2[2] = $send_message;
$data2[3] = $send_user;
$data2[4] = $send_user_name;

$sql_get_img_user="SELECT * FROM `user` WHERE `userID` = '".$user_send."'";
$sqls_get_img_user = mysqli_query($con,$sql_get_img_user);
$rowess = mysqli_fetch_array($sqls_get_img_user);

$data2[5] = base64_decode($rowess['userset']);


$result = urlencode(json_encode($data2,JSON_UNESCAPED_UNICODE));

echo $result;
?>