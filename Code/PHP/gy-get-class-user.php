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
$data[0] = '<img src="'.base64_decode($rows['userset']).'" data-src="./img/LZY_wbesite.png" style="width:60%"  class="rounded" alt="'.$rows['id'].'">';
$data[1] = '</div>';
$data[2] = '<div class="col-md-7">';
$data[3] = '<div class="card-body text-secondary">';
$data[4] = '<h4 class="card-title" style="color:#18f4ff">['.$power.']'.base64_decode($rows['name']).'</h4>';
$data[5] = '<small style="color:#00d6e1;font-size:14px">联系方式:<br>QQ('.Randenc2($user_info['qq'],"decode").')<br>微信('.Randenc2($user_info['wechat'],"decode").')<br>电话('.Randenc2($user_info['phone'],"decode").')<br>邮箱('.Randenc2($user_info['box'],"decode").')</small><br>';
$data[6] = '<div class="card-text" style="word-wrap:break-word;word-break:normal;"><p style="color:#81c5ff;font-size:20px">'.base64_decode($rows['self']).'</p></div><br>';
$result = "";
for ($i = 0; $i < count($data); $i++) {
     $result .= $data[$i];
}
echo $result;
?>