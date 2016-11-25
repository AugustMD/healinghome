<?php
include("config.php");
session_start();

if(($_POST['lid']!=null)&&($_POST['progress']!=null)){
  $sql = "UPDATE land_list SET `progress`='".$_POST['progress']."' WHERE lid = '".$_POST['lid']."'";
  $result = mysqli_query($conn, $sql);
  if($result) echo 1;
  else echo '오류가 발생했습니다!.';

}else{
  header('Location: ./land-info.php');
}
?>
