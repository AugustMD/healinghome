<?php
include("config.php");
session_start();

if(($_POST['pid']!=null)&&($_POST['option_name']!=null)&&($_POST['contents']!=null)&&($_POST['price']!=null)){
  $sql = "INSERT INTO option_table (pid, option_name, contents, price) VALUES ('".$_POST['pid']."', '".$_POST['option_name']."', '".$_POST['contents']."', '".$_POST['price']."')";
  $result = mysqli_query($conn, $sql);
  if($result) echo 1;
  else echo '오류가 발생했습니다!.';

}else{
  echo '오류가 발생했습니다.';
}
?>
