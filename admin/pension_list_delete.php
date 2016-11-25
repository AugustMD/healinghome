<?php
include("config.php");
session_start();

if($_POST['pid']!=null) {
    $sql = "DELETE FROM `pension_list` where pid='".$_POST['pid']."'";
    $result = mysqli_query($conn, $sql);
    $sql2 = "DELETE FROM `pension&tourist_spot` where pid='".$_POST['pid']."'";
    $result2 = mysqli_query($conn, $sql2);
    $sql3 = "DELETE FROM `option_table` where pid='".$_POST['pid']."'";
    $result3 = mysqli_query($conn, $sql3);
    if($result) {
      if($result2) {
        if($result3) {
          echo '삭제';
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

?>
