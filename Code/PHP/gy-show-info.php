<?php
include("../../Apis/Code/Rand.php");
$value = $_GET["value"];
echo Randenc2($value,"decode");
?>