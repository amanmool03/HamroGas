<?php
include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Files</title>
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css\backend.css">
  <link rel="shortcut icon" href="logo.jpg"> -->
  <style type="text/css">
    body{background: url(image/b5.gif);
      background-size: cover;}
    input[type=number],input[type=text],input[type=submit]{padding-top: 0.8%;padding-bottom: 0.8%;}
    input[type=file]{padding-top: 0.5%;padding-bottom: 0.5%;}
    table{
      text-align: center;
    }
   tr:nth-child(even){background-color: #f2f2f2;}
    
  </style>
</head>
<body>



<?php

$sql = "SELECT * FROM gas_cylinders WHERE 1 Limit 0, 10";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>   <div class="class1" style="color: white; margin-bottom: 50px;">
  <a href="Dashboard.php" style="text-decoration: none;color:black;margin:100px;color: #f04747;">Back</a>
  

  </div>

<center>
  <h1 style="margin-top: 50px; margin-left: 0px; color:white;">product</h1>
  <div id="wrapper">
   

    <div class="content">

      
      
 <table border="1" cellspacing="0" cellpadding="20" width="100%" style="color: #f04747;">
  <tr>
    <th>S.N.</th>
    <th>Thumbnail</th>
    <th>File Name</th>
    <th>content</th>
    <th>Stock</th>
    <th>Created At</th>
    <!-- <th>Action</th> -->
  </tr>

  <?php
  if (mysqli_num_rows($result) > 0) {
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
      if ($i%2 == 0){
        ?>
                <tr style="background: #87ceeb6e; ">


        <?php
      }
      ?>
        <td style="text-align: center;"><?= ++$i;?></td>
        <td style="text-align: center;"><img style="width: 80px; border: 1px solid #eee;" src="image/<?= $row["image"];?>" alt="Thumb"></td> 
        <td><?= $row["image"];?></td>
        <td><?= $row["content"];?></td>
        <td><?= $row["stock"]?></td>
        <td><?= $row["ADD_Date "];?></td>
        <td ><a style="color: #F00; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this file?')" href="delete_file.php?id=<?= $row['id'];?>">&#10008;</a></td>
      </tr>
      <?php
    }   
  } else {
    ?>
    <tr>
      <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
  }
  ?>
  <?php 
  mysqli_close($conn);
  ?>
</table>
  
   
 </div>
 <hr>
    
</center>
</body>
</html>