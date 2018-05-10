<!DOCTYPE html>
<html>
    <title>
    <link rel="stylesheet" type = "text/css" href="style.css">
</title>
<body>

<?php


$link = mysqli_connect("localhost", "root", "root", "videoclash");
//if doesnt link gives error
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM video";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Video Name</th>";
                echo "<th>Link</th>";
                echo "<th>Counter</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['video_name'] . "</td>";
                echo "<td>" . $row['link'] . "</td>";
                echo "<td>" . $row['counter'] . "</td>";
                
            echo "</tr>";
        }
        echo "</table>";
		
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
<a href="add.html" class="button1">Add!</a>

<a href="Clash.php" class="button1">Clash!</a>

<a href="index.html" class="button1">Homepage</a>

</body>
</html>
