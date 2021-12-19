<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel = "stylesheet" href = "mcss.css">
        <Title>
            Incident Name
        </Title>
    </head>
    <body>
        <div class="topnav" style="text-align:left">
            <a href="index.html">Home</a>
            <a href="#about">About</a>
        </div>

        <?php
            $id = $_GET["counter"];
            $db_host = "localhost";
            $db_user = "root";
            $db_pwd = "";
            $db_name = "incidentcounter";
            $conn = new mysqli($db_host,$db_user,$db_pwd,$db_name);
            if(!is_numeric($id)){
                echo "<h1>Error: Invalid Tag</h1>";
                exit();
            }
            $sql = "SELECT tag, incname,inctotal,inclaston FROM incidents WHERE tag = $id";
            $result = $conn->query($sql);
            if($result->num_rows == 0){
                echo "<h1>Error 404: Counter not found.</h1>";
            }else{
                $row = $result->fetch_array();
                echo "<h1>";
                echo $row["incname"];
                echo "</h1>";
                echo "<div class='counter'>";
                echo $row["inctotal"];
                echo "</div>";
                echo "<div>";
                echo "Total Incidents";
                echo "<br>";
                echo "Last Incident On: ";
                echo $row["inclaston"];
                echo "<br>";
                echo "Tag: ".$row["tag"];
                echo "</div>";
    
                echo "<p><form action = '../server_stuff/increment_counter.php?counter=".$id,"' method = 'post'>
                    <input type='submit' value = 'Increment'>
                </form>
                </p>";
            }
        ?>
    </body>

</html>