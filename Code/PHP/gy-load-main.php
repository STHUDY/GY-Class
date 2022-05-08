<?php
if($load_need['home_background'] == true){
    $background = file_get_contents($load['home_background']);
}
if($load_need['home_main'] == true){
    $main = file_get_contents($load['home_main']);
}
if($load_need['user_sign_in'] == true){
    $main = file_get_contents($load['user_sign_in']);
}
if($load_need['user_register'] == true){
    $main = file_get_contents($load['user_register']);
}
if($load_need['API'] == true){
    $JS_API_config = json_decode(file_get_contents($load['API']),true);
    $api_script = $JS_API_config['script'];
}
?>