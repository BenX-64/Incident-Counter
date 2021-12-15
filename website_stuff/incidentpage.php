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
            $sql = "SELECT tag, incname,inctotal,inclaston FROM incidents WHERE tag = $id";
            $result = $conn->query($sql);
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
            echo "</div>";
        ?>
        <p>
            <form action = "index.php" method = "post">
                <input type="submit" value = "Increment">
            </form>
        </p>
    </body>




    </body>
</html>