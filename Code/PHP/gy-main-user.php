<?php
if($load_need['user_nav'] == true){
    $nav = file_get_contents($load['user_nav']);
}
if($load_need['background'] == true){
    $background = file_get_contents($load['background']);
}
if($load_need['welcome'] == true){
    $main = file_get_contents($load['welcome']);
}
if($load_need['noclass'] == true){
    $main = file_get_contents($load['noclass']);
}
if($load_need['allclass'] == true){
    $main = file_get_contents($load['allclass']);
}
if($load_need['userset'] == true){
    $main = file_get_contents($load['userset']);
}
if($load_need['notice'] == true){
    $main = file_get_contents($load['notice']);
}
if($load_need['chat'] == true){
    $main = file_get_contents($load['chat']);
}
?>