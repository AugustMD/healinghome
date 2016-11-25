<?php
include("config.php");
session_start();

if(($_POST['pid']!=null)&&($_POST['tid']!=null)){
  $sql = "INSERT INTO `pension&tourist_spot` (pid, tid) VALUES ('".$_POST['pid']."', '".$_POST['tid']."')";
  $result = mysqli_query($conn, $sql);
  if($result) echo 1;
  else echo '오류가 발생했습니다!.';

}else{
  echo '오류가 발생했습니다.';
}
?>
