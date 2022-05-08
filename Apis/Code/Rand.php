<?php 
function Randenc($value,$type){
    $api_config = json_decode(file_get_contents("./Apis/Default/api-use.json"),true);
    
    $API = "http://api.sthudy.top/API/enc.php?id=".$api_config['userid-api']."&uic=".$api_config['id-api']."&type=".$type."&text=".$value;
    $result = file_get_contents($API);
    return $result;
}
function Randenc2($value,$type){
    $api_config = json_decode(file_get_contents("../../Apis/Default/api-use.json"),true);
    
    $API = "http://api.sthudy.top/API/enc.php?id=".$api_config['userid-api']."&uic=".$api_config['id-api']."&type=".$type."&text=".$value;
    $result = file_get_contents($API);
    return $result;
}
?>