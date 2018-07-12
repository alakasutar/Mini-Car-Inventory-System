<?php

function onClickBtnSold(){
echo "asd";
    $sqlUpdate=" UPDATE carModel SET carCount = $carCountVal -1 WHERE modelName = modelNameId ";
    mysqli_query($conn_rw, $sqlUpdate);
}

