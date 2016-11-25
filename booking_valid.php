<?php
include("config.php");
session_start();

if(($_POST['id']!=null)&&($_POST['pid']!=null)&&($_POST['checkin']!=null)&&($_POST['checkout']!=null)&&($_POST['number']!=null)&&($_POST['total_price']!=null)){
  $sql_book = "SELECT * FROM `booking` WHERE pid='".$_POST['pid']."' and ((checkin>='".$_POST['checkin']."' and checkin<'".$_POST['checkout']."') or (checkout>'".$_POST['checkin']."' and checkout<='".$_POST['checkout']."') or (checkin<'".$_POST['checkin']."' and checkout>'".$_POST['checkout']."'))";
  $result_book = mysqli_query($conn, $sql_book);

  if($result_book->num_rows != 0) {
    echo '예약현황을 확인하시고 다시 날짜를 선택해주세요.';
  }
  else {
    $sql = "INSERT INTO `booking` (`pid`, `checkin`, `checkout`, `id`, `number`, `option_name`, `total_price`) VALUES ('".$_POST['pid']."', '".$_POST['checkin']."', '".$_POST['checkout']."', '".$_POST['id']."', '".$_POST['number']."', '".$_POST['option_name']."', '".$_POST['total_price']."')";
    $result = mysqli_query($conn, $sql);
    if($result) echo $result_book->num_rows;
    else echo '오류가 발생했습니다.';
  }


}else{
  header('Location: ./');
}
?>
