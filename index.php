<?php
if(isset($_COOKIE['UserID']) == true){
    //user setting
    require("./Code/PHP/gy-con-user.php");
    $load = json_decode(base64_decode($row['set']),true);
    $now_web = str_replace('/',"",$_SERVER["REQUEST_URI"]);
    $load_config = json_decode(file_get_contents($config_load_choose),true);
    if(isset($load_config[$now_web]) == false){
        header("location:main");
    }
    $load_need = json_decode(file_get_contents($load_config[$now_web]),true);
    require("./Code/PHP/gy-main-user.php");
    
}else{
    $load_file = file_get_contents("./user/config/main/Default.json");
    $load = json_decode($load_file,true);
    $load_config = json_decode(file_get_contents("./Config/config.json"),true);
    $now_web = str_replace('/',"",$_SERVER["REQUEST_URI"]);
    if(isset($load_config[$now_web]) == false){
        header("location:main");
    }
    $load_need = json_decode(file_get_contents($load_config[$now_web]),true);
    require("./Code/PHP/gy-load-main.php");
}

?>
<html>
    <head>
        <title>光忆同学录</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href='./Code/CSS/bootstrap5/icons/bootstrap-icons.css' rel='stylesheet'>
        <link href='./Code/CSS/bootstrap5/css/bootstrap.css' rel='stylesheet'>
        <link href='./Code/CSS/gy-css.css' rel='stylesheet'>
        <link href='./Code/CSS/gy-css-load.css' rel='stylesheet'>
        <link href='./Code/CSS/gy-css-run.css' rel='stylesheet'>
        <link rel="icon" href="./Info/IMG/ICO/Default.png" type="image/x-icon">
        <link rel="shortcut icon" href="./Info/IMG/ICO/Default.png" type="image/x-icon">
        <script src='./Code/CSS/bootstrap5/js/bootstrap.min.js'></script>
        <script src='./Code/JS/gy-js.js'></script>
        <script src='./Code/JS/gy-cookie.js'></script>
        <script src='./Code/JS/gy-base64.js'></script>
        <script src='./Code/JS/jquery3.6.0.js'></script>
        
        <?php
        echo $api_script;
        ?>
        
    </head>
    <body>
        <div>
            <!---导航条-->
            <?php
            echo $nav
            ?>
            <!---导航条-->
        </div>
        <main class='container-fluid'>
            <!--网页主体-->
            
                <!--背景以及介绍-->
                <?php
                echo $background;
                ?>
                <!--背景以及介绍---->
                
                <!--网页主体-->
                <?php
                echo $main;
                ?>
                <!--网页主体-->
                
            <!--网页主体-->
        </main>
        <iframe src="" frameborder="0" name="form-submit" style='display:none'></iframe>
    </body>
</html>
