<?php
include("config.php");
session_start();

if(($_POST['id']!=null)&&($_POST['pid']!=null)&&($_POST['bid']!=null)&&($_POST['text']!=null)){
  $sql_review = "SELECT * FROM `review_list` WHERE pid='".$_POST['pid']."' and bid='".$_POST['bid']."'";
  $result_review = mysqli_query($conn, $sql_review);

  if($result_review->num_rows != 0) {
    echo '이미 리뷰를 작성하셨습니다.';
  }
  else {
    $sql = "INSERT INTO `review_list` (`pid`, `bid`, `id`, `facility`, `service`, `cleanliness`, `location`, `price`, `accuracy`, `date`, `review`) VALUES ('".$_POST['pid']."', '".$_POST['bid']."', '".$_POST['id']."', '".$_POST['facility']."', '".$_POST['service']."', '".$_POST['cleanliness']."', '".$_POST['location']."', '".$_POST['price']."', '".$_POST['accuracy']."', CURDATE(), '".$_POST['text']."')";
    $result = mysqli_query($conn, $sql);
    if($result) echo $result_review->num_rows;
    else echo '오류가 발생했습니다!.';
  }


}else{
  header('Location: ./');
}
?>
