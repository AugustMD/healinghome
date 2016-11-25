<?php
include("config.php");
session_start();

if(($_POST['qid']!=null)&&($_POST['comment']!=null)){
  $sql = "INSERT INTO customer_land_comment (`qid`, `id`, `comment`, `date`) VALUES ('".$_POST['qid']."', '".$_SESSION['landLord_id']."', '".$_POST['comment']."', now())";
  $result = mysqli_query($conn, $sql);
  if($result) echo 1;
  else echo '오류가 발생했습니다!.';

}else{
  header('Location: ./customer.php');
}
?>
