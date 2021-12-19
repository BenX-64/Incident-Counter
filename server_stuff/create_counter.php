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
    $tag = shell_exec('create_id.exe');
    $sql_id =  "SELECT tag FROM incidents WHERE tag = $tag";

    $temp = $conn->query($sql_id);
    //Checks if generated id is unique and regenerates until id is unique.
    while($temp->num_rows > 0){
        $tag = shell_exec('create_id.exe');
        $temp = $conn->query($sql_id);
        if($temp->num_rows==0){
            break;
        }
    }

    /*
    $sql_create_inc = "INSERT INTO `incidents`(`tag`, `incname`, `inclaston`) VALUES ('$tag','$incname','$date')";
    if($conn->query($sql_create_inc) == TRUE){
        header('location:../website_stuff/incidentpage.php?counter='.$tag);
    }else{
        echo "Error: " . $sql_create_inc . "<br>" . $conn->error;
    }
*/

    $stmt = $conn->prepare("INSERT INTO incidents(tag, incname, inclaston) VALUES (?,?,?)");
    $stmt->bind_param("sss",$tag,$incname,$date);
    if($stmt->execute()){
        header('location:../website_stuff/incidentpage.php?counter='.$tag);
    }else{
        echo "failed :/";
    }
    $stmt->close();

    $conn->close();

?>