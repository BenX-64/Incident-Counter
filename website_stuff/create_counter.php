<?php
    error_reporting(0);
    $incname = $_POST['incname'];

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

    //Add incident to database
    $date = date("y-m-d");
    //Creates unique id
    chdir('../server_stuff/');
    $tag = shell_exec('create_id.exe');
    $sql_id =  "SELECT tag FROM incidents WHERE tag = $tag";
    $temp = $conn->query($sql_id);
    //Checks if generated id is unique and regenerates until id is unique. 
    while($temp->num_rows > 0){
        $tag = shell_exec('create_id.exe');
        $temp = $conn->query($sql_id);
    }
    
    $sql_create_inc = "INSERT INTO `incidents`(`tag`, `incname`, `inctotal`, `inclaston`) VALUES ('$tag','$incname','[value-3]','$date')";
    if($conn->query($sql_create_inc) == TRUE){
        echo "it works!";
    }else{
        echo "Error: " . $sql_create_inc . "<br>" . $conn->error;
    }
    
    $conn->close();
?>