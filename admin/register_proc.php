<?php
include("config.php");
session_start();

if(($_POST['id']!=null)&&($_POST['pwd']!=null)&&($_POST['name']!=null)&&($_POST['phone']!=null)){
  $sql = "SELECT * FROM user_info WHERE id='".$_POST['id']."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if($result->num_rows == 1){
    echo '이미 등록된 ID가 있습니다.';
  }else{
    $hash = password_hash($_POST['pwd'], PASSWORD_BCRYPT); // BCRYPT 암호화
    $sql = "INSERT INTO user_info (id, pwd, name, phone, authority)
    VALUES('".$_POST['id']."', '$hash', '".$_POST['name']."', '".$_POST['phone']."'. 'admin')";
    $result = mysqli_query($conn, $sql);
    if($result) echo '관리자 등록이 완료되었습니다.';
    else echo '오류가 발생했습니다.';
  }

}else{
  $_SESSION['admin_msg']='모든 항목을 입력해주세요.';
  header('Location: ./');
}
?>
