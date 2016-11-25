<?php
    //header('Content-Type: application/json');
    include("config.php");
    include("func.php");
    $where_string = $_POST['where_string'];
    $sql = "SELECT * FROM pension_list ".$where_string;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $pid = $row[pid];
      $sql2 = "SELECT image FROM pension_image WHERE pid = $pid";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $sql3 = "SELECT * FROM review_list WHERE pid = $pid";
      $result3 = mysqli_query($conn, $sql3);
      $facility = 0;
      $service = 0;
      $cleanliness = 0;
      $location = 0;
      $price = 0;
      $accuracy = 0;
      while($row3 = mysqli_fetch_assoc($result3)) {
        $facility += $row3[facility];
        $service += $row3[service];
        $cleanliness += $row3[cleanliness];
        $location += $row3[location];
        $price += $row3[price];
        $accuracy += $row3[accuracy];
      }
      $rating = ($facility + $service + $cleanliness + $location + $price + $accuracy) / (6*$result3->num_rows);
      $rating = round($rating, 1);

      echo '<article class="white-panel" style="cursor:pointer" onclick="houseInfo('.$pid.')" onmouseover="_onmouseover('.$row[latitude].', '.$row[longitude].')" onmouseout="_onmouseout()"><img src='.$row2[image].'>
          <div class="caption">
              <h4 class="pull-right" id="lowest_price">'.number_format($row[weekday2_low]).'원</h4>
              <h4>['.$row[region].'] '.$row[name].'</h4>
              <p>#'.$row[note].'</p>
          </div>

          <div class="ratings">
              <p class="pull-right">'.$result3->num_rows.' reviews</p>
              <p>';
                  rating($rating);?>
                  <span><strong style="color: #D17581;"><?php echo sprintf("%2.1f", $rating);?></strong></span>
              <?php echo '
              </p>
          </div>
      </article>';
      }
    /*$result_array = array();
    while($row = mysqli_fetch_assoc($result)) {

      $result_array[] = $row;
    }
    $result_array = json_encode($result_array);

    echo $result_array."\n";*/

?>
