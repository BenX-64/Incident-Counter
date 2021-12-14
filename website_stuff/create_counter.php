<?php
    error_reporting(0);
    $incname = $_POST['incname'];

    //Database Connection Shenanigans
    $con = mysqli_connect("localhost","my_user","my_password","incidentcounter");
?>