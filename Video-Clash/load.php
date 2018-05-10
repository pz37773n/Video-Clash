<?php

$connection = mysqli_connect("localhost", "root", "root", "videoclash");

if($connection === false){
    die("Error failed to connect" . mysqli_connect_error());
}

$video_name = mysqli_real_escape_string($connection, $_GET['video_name']);
$video_url = mysqli_real_escape_string($connection, $_GET['video_url']);

$sql = "INSERT INTO video (video_name, link, liked, disliked) VALUES ('$video_name', '$video_url', 0, 0)";
if(mysqli_query($connection, $sql)){
    echo "Success";
}else{
    echo "Error";
}

mysqli_close($link);
?>