<?php
    $inctag = $_POST['inctag'];

    $db_host = "localhost";
    $db_user = "root";
    $db_pwd = "";
    $db_name = "incidentcounter";

    //Database Connection Shenanigans
    $conn = new mysqli($db_host,$db_user,$db_pwd,$db_name);
    if ($conn -> connect_error) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }

    $sql_id =  "SELECT tag FROM incidents WHERE tag = $inctag";
    $temp = $conn->query($sql_id);
    echo $temp->num_rows;

    $conn->close();
?>