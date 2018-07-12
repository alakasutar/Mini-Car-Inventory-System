<?php

require "config.php";
require "common.php";
require "templates/header.php";

$modelName = "'" . $_POST['modelName'] . "'";
$carCount = $_POST['carCount'];

if($carCount >1){
    
    $sqlUpdate=" UPDATE carModel SET carCount = $carCount -1 WHERE modelName = $modelName ";
    mysqli_query($conn_rw, $sqlUpdate);
}else{

    $sqlDelete= "DELETE FROM carModel WHERE modelName = $modelName";
    mysqli_query($conn_rw, $sqlDelete);
}



?>