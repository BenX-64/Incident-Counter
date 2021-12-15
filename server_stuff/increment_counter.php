<?php
    $tag = $_GET["counter"];
    $db_host = "localhost";
    $db_user = "root";
    $db_pwd = "";
    $db_name = "incidentcounter";

    //Database Connection Shenanigans
    $conn = new mysqli($db_host,$db_user,$db_pwd,$db_name);

    $date = date("y-m-d");
    echo $date;
    $sql_id =  "UPDATE incidents SET inctotal=inctotal+1, inclaston = '$date' WHERE tag = $tag";
    $conn->query($sql_id);

   header('location:../website_stuff/incidentpage.php?counter='.$tag);
?>