<html>
<head>
        <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>

<style>



</style>
<title>
        Video Clash!
</title>
        <link rel="stylesheet" type = "text/css" href="style.css">
        <!-- Style sheet ref-->
</head>
<body onLoad = "grabvid()" >


    <h1><center>What is Clash?</center></h1>
    <p><center>
        Clash allows you to upload a video either from YouTube and go up against other videos in One on One combat. The winner gets a point added to their video while the loser gets a point deducted. <br>Click the like button on the video you like the most
    </center></p>
    <center><img onclick="counter(1)" onmouseover="style.cursor" src="https://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png" height="70" width="70"/></center>
    


<br><br>

<?php
$connection=mysqli_connect ('localhost', "root", "root");
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}

$db_selected = mysqli_select_db($connection, "videoclash");
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}

$count = "SELECT * FROM video";
if($result = mysqli_query($connection, $count)){
  if(mysqli_num_rows($result) > 0){
    $num = rand(1, mysqli_num_rows($result));
    $num2 = rand(1, mysqli_num_rows($result));
    if($num2 == $num){
      $num2 = rand(1, mysqli_num_rows($result));
    }
  }
}else {
  echo "ERROR";
}


$sql = "SELECT * FROM video WHERE id = '$num'";
$sql2 = "SELECT * FROM video WHERE id = '$num2'";

$result = mysqli_query($connection, $sql);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
$result2 = mysqli_query($connection, $sql2);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
$row = @mysqli_fetch_assoc($result);
$row2 = @mysqli_fetch_assoc($result2);
$vid_id = $row['id'];
$vid_id2 = $row2['id'];

echo '<center><iframe width="560" height="315" src="'.$row['link'].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>';
echo "<center><strong>VS.<center></strong>";
echo '<center><iframe width="560" height="315" src="'.$row2['link'].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>';

?>
<img onclick="counter(2)" onmouseover="style.cursor" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Facebook_Like_button.svg/2000px-Facebook_Like_button.svg.png" height="70" width="70"/>
<script>

var clicked = false;

function counter(selected)
{
  if(clicked == false)
  {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
          document.getElementById("submitted").innerHTML = "form submitted";
      }
    };
    var id = <?echo $vid_id ?>;
    var id2 = <?echo $vid_id2 ?>;
     var queryString = "?id=" + id + "&id2=" + id2 + "&selected=" + selected;
     alert("selected");
     xhttp.open("GET", "counter.php" + queryString, true);
     xhttp.send(null);
     clicked = true;
  }else {
    return;
  }
}

</script>

<center><a href="add.html" class="button4">Try it!</a></center>
<br>
<center><a href="index.html" class="button4">Homepage</a></center>

</body>
</html>
