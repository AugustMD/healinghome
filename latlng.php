<?php
    header('Content-Type: application/json');
    include("config.php");
    $checkin = "'".$_GET['checkin']."'";
    $checkout = "'".$_GET['checkout']."'";
    $sql = "SELECT pid, latitude, longitude FROM pension_list WHERE pid NOT IN (SELECT pid FROM `booking` where checkin >= ".$checkin." and checkin < ".$checkout." or checkout > ".$checkin." and checkout <= ".$checkout.")";
    $result = mysqli_query($conn, $sql);
    $result_array = array();
    while($row = mysqli_fetch_assoc($result)) {
      $result_array[] = $row;
    }
    $result_array = json_encode($result_array);

    echo "{ \"positions\": ";
    echo $result_array."\n";
    echo "}";

?>
