<?php

function deleteTable($conn, $tableName){

    $command = "DROP TABLE $tableName";
    $res = $conn->query($command);
    if ($res) {
        $_SESSION['success'] = "Table deleted success!";
    }else{
        $_SESSION['error'] = "Opps! Something went wrong.";
    }
    header('Location: index.php');
}