<?php

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

#Connection
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


$sql = "SELECT * FROM video WHERE id in ('$num','$num2')";
$result = mysqli_query($connection, $sql);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;

while ($row = @mysqli_fetch_assoc($result)){
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'video_name="' . $row['video_name'] . '" ';
  echo 'video_url="' . $row['link'] . '" ';
  echo 'liked="' . $row['liked'] . '" ';
  echo 'disliked="' . $row['disliked'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}
echo '</markers>';

?>
