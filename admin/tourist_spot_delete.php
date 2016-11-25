<?php
include("config.php");
session_start();

if($_POST['tid']!=null) {
    $sql = "DELETE FROM `tourist_spot` where tid='".$_POST['tid']."'";
    $result = mysqli_query($conn, $sql);
    $sql2 = "DELETE FROM `pension&tourist_spot` where tid='".$_POST['tid']."'";
    $result2 = mysqli_query($conn, $sql2);
    if($result) {
      if($result2) {
        echo '삭제에 성공하였습니다.';
      }
    }
    else {
      echo '오류가 발생했습니다.';
    }
}

?>
