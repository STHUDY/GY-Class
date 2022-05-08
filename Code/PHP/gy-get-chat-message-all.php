<?php
$type = $_GET['type'];
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
    $data = "0";
}else{
    $data = json_decode($message,true);
    $number = strval(count($data));
}
if($type == 'loaded'){
    setcookie('MessageI',$number,time()+60*60*24*30);
    echo $number;
}else if($type == 'loading'){
    if($number != $_COOKIE['MessageI']){
        setcookie('MessageI',$number,time()+60*60*24*30);
        setcookie('LoadMessage',strval(count($data) - 2),time()+60*60*24*30,'/');
        echo strval(count($data) - 1);
    }else{
        echo '0';
    }
    
}
?>