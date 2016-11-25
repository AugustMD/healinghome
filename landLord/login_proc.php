<?php
include("config.php");
session_start();

if(($_POST['id']!=null)&&($_POST['pwd']!=null)){
  $sql = "SELECT * FROM user_info WHERE id='".$_POST['id']."' and authority='landLord'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if(($result->num_rows == 1) && password_verify($_POST['pwd'], $row['pwd'])){
    $_SESSION['landLord_is_login']=true;
    $_SESSION['landLord_id']=$row['id'];
    $_SESSION['landLord_name']=$row['name'];
    $_SESSION['landLord_phone']=$row['phone'];
    echo $_SESSION['landLord_id'];
    //header('Location: ./main.php');
  }else{
    $_SESSION['landLord_msg']='wrong id or pw';
    //header('Location: ./login.php');
    echo '이메일 또는 비밀번호를 확인해주세요';
  }

}else{
  $_SESSION['landLord_msg']='null id or pw';
  header('Location: ./');
}
?>
