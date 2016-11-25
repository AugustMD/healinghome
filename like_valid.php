<?php
include("config.php");
session_start();

if(($_POST['id']!=null)&&($_POST['pid']!=null)){
  $sql_like = "SELECT * FROM `user_like` WHERE id = '".$_POST['id']."' and pid = '".$_POST['pid']."' ";
  $result_like = mysqli_query($conn, $sql_like);
  if($result_like->num_rows == 0) { //찜하기
    $sql = "INSERT INTO `user_like` (`id`, `pid`) VALUES ('".$_POST['id']."', '".$_POST['pid']."')";
    $result = mysqli_query($conn, $sql);
    if($result) echo $result_like->num_rows;
    else echo '오류가 발생했습니다.';
  }
  else { //찜하기 취소
    $sql = "DELETE FROM `user_like` WHERE id = '".$_POST['id']."' and pid = '".$_POST['pid']."' ";
    $result = mysqli_query($conn, $sql);
    if($result) echo $result_like->num_rows;
    else echo '오류가 발생했습니다.';
  }
  
}else{
  header('Location: ./');
}
?>
