<?php 
$numbers = $_GET['number'];
$mysql = json_decode(file_get_contents("../../Config/mysql.json"),true);
$con = mysqli_connect($mysql['host'],$mysql['username'],$mysql['password'],$mysql['dbname']);
if (mysqli_connect_errno()) {
echo '<script>window.alert("Connect failed: '.mysqli_connect_error().'")</script>';
exit();
}
$sql_user="SELECT * FROM `user` WHERE `userID` = '".$_COOKIE['UserID']."'";
$sqls_user = mysqli_query($con,$sql_user);
$row = mysqli_fetch_array($sqls_user);
$sql_get_class_user="SELECT * FROM `user` WHERE `classcode` = '".$row['classcode']."'";
$sqls_get_class_user = mysqli_query($con,$sql_get_class_user);
for($i = 0;$i <= intval($numbers);$i++){
    $rows = mysqli_fetch_array($sqls_get_class_user);
}
if(intval($rows['power']) == 0){
    $power = "学生";
}else if(intval($rows['power']) == 1){
    $power = "课代表";
}else if(intval($rows['power']) == 2){
    $power = "班长";
}else if(intval($rows['power']) == 3){
    $power = "管理员";
}
$user_info = json_decode(base64_decode($rows['info']),true);
include("../../Apis/Code/Rand.php");
$data[0] = '['.$power.']';
$data[1] = base64_decode($rows['name']);
for ($i = 0; $i < count($data); $i++) {
     $result[1] .= $data[$i];
}
$result[2] .= $rows["userID"];
echo urlencode((json_encode($result)));
?>