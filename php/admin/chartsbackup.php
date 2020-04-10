<?php
    $conn = mysqli_connect("localhost","root","","notify"); 
 $sql1= "SELECT * FROM `view_stats`";
          $result1 = mysqli_query($conn,$sql1);
          $total = mysqli_num_rows($result1);
          $total = $total - 7;
            if($total<0)
            {
              $total=0;
            }

        echo $total;

?>

    