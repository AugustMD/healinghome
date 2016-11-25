<?php
session_start();
include("config.php");

$sql = "INSERT INTO pension_list (name, region, number, address, latitude, longitude,
   checkin, checkout, summer, winter, note, weekday2_low, weekday2_peak, weekend2_low, weekend2_peak, weekday3_low, weekday3_peak, weekend3_low, weekend3_peak, weekday4_low, weekday4_peak, weekend4_low, weekend4_peak, direction)
VALUES('".$_POST['pname']."', '".$_POST['region']."', '".$_POST['qnumber']."', '".$_POST['address']." ".$_POST['address2']."', '".$_GET['lat']."', '".$_GET['lng']."', '".$_POST['checkin']."', '".$_POST['checkout']."', '".$_POST['summer']."', '".$_POST['winter']."', '".$_POST['note']."',
'".$_POST['weekday2_low']."', '".$_POST['weekday2_peak']."', '".$_POST['weekend2_low']."', '".$_POST['weekend2_peak']."', '".$_POST['weekday3_low']."', '".$_POST['weekday3_peak']."', '".$_POST['weekend3_low']."', '".$_POST['weekend3_peak']."', '".$_POST['weekday4_low']."', '".$_POST['weekday4_peak']."', '".$_POST['weekend4_low']."', '".$_POST['weekend4_peak']."', '".$_POST['direction']."')";
$result = mysqli_query($conn, $sql);
if(!$result) {
  echo 'error';
}
else {
  $sql2 = "SELECT pid FROM pension_list
  where name='".$_POST['pname']."'
  and region='".$_POST['region']."'
  and number='".$_POST['qnumber']."'
  and address='".$_POST['address']." ".$_POST['address2']."'
  and latitude='".$_GET['lat']."'
  and longitude='".$_GET['lng']."'
  and checkin='".$_POST['checkin']."'
  and checkout='".$_POST['checkout']."'
  and summer='".$_POST['summer']."'
  and winter='".$_POST['winter']."'
  and note='".$_POST['note']."'
  and weekday2_low='".$_POST['weekday2_low']."'
  and weekday2_peak='".$_POST['weekday2_peak']."'
  and weekend2_low='".$_POST['weekend2_low']."'
  and weekend2_peak='".$_POST['weekend2_peak']."'
  and weekday3_low='".$_POST['weekday3_low']."'
  and weekday3_peak='".$_POST['weekday3_peak']."'
  and weekend3_low='".$_POST['weekend3_low']."'
  and weekend3_peak='".$_POST['weekend3_peak']."'
  and weekday4_low='".$_POST['weekday4_low']."'
  and weekday4_peak='".$_POST['weekday4_peak']."'
  and weekend4_low='".$_POST['weekend4_low']."'
  and weekend4_peak='".$_POST['weekend4_peak']."'
  and direction='".$_POST['direction']."'";
  $result2 = mysqli_query($conn, $sql2);
  mysqli_data_seek($result2, $result2->num_rows-1);
  $row2 = mysqli_fetch_assoc($result2);
  echo $row2[pid];
}

?>
