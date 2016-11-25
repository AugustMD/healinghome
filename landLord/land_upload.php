<!DOCTYPE html>
<?php
session_start();
include("config.php");

$sql = "INSERT INTO land_list (id, address, start, end, price, area, progress) VALUES('".$_SESSION['landLord_id']."', '".$_POST['address']." ".$_POST['address2']."', '".$_POST['start']."', '".$_POST['end']."', '".str_replace(",", "", $_POST['price'])."', '".str_replace(",", "", $_POST['area'])."', '등록완료')";
$result = mysqli_query($conn, $sql);
if(!$result) {
  echo '<script>alert("오류가 발생했습니다.'.$sql.'");</script>';
  echo '<script>location.replace("./land_register.php")</script>';
}
else {
  $sql2 = "SELECT lid FROM land_list where id='".$_SESSION['landLord_id']."' and address='".$_POST['address']." ".$_POST['address2']."' and start='".$_POST['start']."' and end='".$_POST['end']."' and price='".str_replace(",", "", $_POST['price'])."' and area='".str_replace(",", "", $_POST['area'])."' and progress='등록완료'";
  $result2 = mysqli_query($conn, $sql2);
  mysqli_data_seek($result2, $result2->num_rows-1);
  $row2 = mysqli_fetch_assoc($result2);
  $target_file = "";
  for($i=0; $i < count($_FILES["files"]["name"]); $i++) {
    if(basename($_FILES["files"]["name"][$i]) != '') {
      $target_dir = "uploads/";
      $target_file = $target_dir.microtime()._.basename($_FILES["files"]["name"][$i]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["files"]["tmp_name"][$i]);
          if($check !== false) {
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      while (file_exists($target_file)) {
          $target_file = md5(microtime()).$target_file;
      }
      $target_file = preg_replace("/\s+/","",$target_file); //공백 제거

      // Check file size
      if ($_FILES["files"]["size"][$i] > 1000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], $target_file)) {

          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
    }
    $sql = "INSERT INTO land_attachment (lid, image) VALUES('".$row2[lid]."', '".$target_file."')";
    $result = mysqli_query($conn, $sql);
  }

  for($i=0; $i < count($_FILES["files2"]["name"]); $i++) {
    if(basename($_FILES["files2"]["name"][$i]) != '') {
      $target_dir = "uploads/";
      $target_file = $target_dir.microtime()._.basename($_FILES["files2"]["name"][$i]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      /*if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["files2"]["tmp_name"][$i]);
          if($check !== false) {
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }*/
      while (file_exists($target_file)) {
          $target_file = md5(microtime()).$target_file;
      }
      $target_file = preg_replace("/\s+/","",$target_file); //공백 제거

      // Check file size
      if ($_FILES["files2"]["size"][$i] > 1000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["files2"]["tmp_name"][$i], $target_file)) {

          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
    }
    $sql = "INSERT INTO land_attachment (lid, attachment) VALUES('".$row2[lid]."', '".$target_file."')";
    $result = mysqli_query($conn, $sql);
  }

  echo '<script>alert("등록이 완료되었습니다.");</script>';
  echo '<script>location.replace("./")</script>';
}



//$sql = "INSERT INTO customer_land (id, title, content, attachment, date) VALUES('".$_SESSION['landLord_id']."', '".$_POST['title']."', '".$_POST['content']."','".$target_file."', now())";

//$result = mysqli_query($conn, $sql);
//if($result) header('Location: ./customer.php');
//else echo "오류가 발생했습니다.";
?>
