<?php
  function rating($category) {
    $floor = floor($category);
    $star_num = floor($floor/2);
    for($i=0; $i<$star_num; $i++) {
      echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
    }
    for($i=0; $i<(5-$star_num); $i++) {
      if($i==0) {
        $width = (round($category, 1) - (floor($floor/2)*2)) * 50;
        echo '<span class="glyphicon glyphicon-star half half'.$width.'" aria-hidden="true"></span>';
      }
      else {
        echo '<span class="glyphicon glyphicon-star half half0" aria-hidden="true"></span>';
      }
    }
  }  
?>
