<?php
include("config.php");
session_start();

if($_GET['pid']!=null) {
    $sql = "UPDATE pension_list
    SET name='".$_POST['pname']."',
    region='".$_POST['region']."',
    number='".$_POST['qnumber']."',
    address='".$_POST['address']." ".$_POST['address2']."',
    latitude='".$_GET['lat']."',
    longitude='".$_GET['lng']."',
    checkin='".$_POST['checkin']."',
    checkout='".$_POST['checkout']."',
    summer='".$_POST['summer']."',
    winter='".$_POST['winter']."',
    note='".$_POST['note']."',
    weekday2_low='".$_POST['weekday2_low']."',
    weekday2_peak='".$_POST['weekday2_peak']."',
    weekend2_low='".$_POST['weekend2_low']."',
    weekend2_peak='".$_POST['weekend2_peak']."',
    weekday3_low='".$_POST['weekday3_low']."',
    weekday3_peak='".$_POST['weekday3_peak']."',
    weekend3_low='".$_POST['weekend3_low']."',
    weekend3_peak='".$_POST['weekend3_peak']."',
    weekday4_low='".$_POST['weekday4_low']."',
    weekday4_peak='".$_POST['weekday4_peak']."',
    weekend4_low='".$_POST['weekend4_low']."',
    weekend4_peak='".$_POST['weekend4_peak']."',
    direction='".$_POST['direction']."' WHERE pid = '".$_GET['pid']."'";
    $result = mysqli_query($conn, $sql);
    $sql2 = "DELETE FROM `pension&tourist_spot` where pid='".$_GET['pid']."'";
    $result2 = mysqli_query($conn, $sql2);
    $sql3 = "DELETE FROM `option_table` where pid='".$_GET['pid']."'";
    $result3 = mysqli_query($conn, $sql3);
    if($result) {
      if($result2) {
        if($result3) {
          echo $_GET['pid'];
        }
        else {
          echo '오류가 발생했습니다.';
        }
      }
      else {
        echo '오류가 발생했습니다.';
      }
    }
    else {
      echo '오류가 발생했습니다.';
    }
}
