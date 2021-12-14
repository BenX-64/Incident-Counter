<?php
    error_reporting(0);
    $incname = $_POST['incname'];

    $db_host = "localhost";
    $db_user = "root";
    $db_pwd = "";
    $db_name = "incidentcounter";
    //Database Connection Shenanigans
    $conn = new mysqli($db_host,$db_user,$db_pwd,$db_name);

// Check connection
    if ($conn -> connect_error) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
    }
    $date = date("y-m-d");
    $sql = "INSERT INTO `incidents`(`tag`, `incname`, `inctotal`, `inclaston`) VALUES ('[value-1]','$incname','[value-3]','$date')";
    if($conn->query($sql) == TRUE){
        echo "it works!";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>