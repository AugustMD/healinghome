<?php
include("config.php");
session_start();

if($_POST['table']!=null && $_POST['src']!=null) {
    $sql = "DELETE FROM `".$_POST['table']."` where image='".$_POST['src']."'";
    $result = mysqli_query($conn, $sql);
    if($result) {
      $_substr = substr($_POST['src'], 0, 8);
      if($_substr != 'uploads/') {
      }
      else {
        unlink("../".$_POST['src']);
      }
      echo '삭제 성공';
    }
    else {
      echo '오류가 발생했습니다.';
      echo $sql;
    }
}
?>
