<?php 
$api_config = json_decode(file_get_contents("../../Apis/Default/api-use.json"),true);
$API = "https://api.sthudy.top/API/htmlcode.php?uic=".$api_config['id-api']."&length=4&code_min=24&code_max=32";
$result = get_url($API);
echo $result;

function get_url($url){
$curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $tmpInfo = curl_exec($curl);     //返回api的json对象
    //关闭URL请求
    curl_close($curl);
    return $tmpInfo;
}
?>