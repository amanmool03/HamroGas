<?php include_once('connection.php'); ?>
<?php 
if(isset($_GET['id']))
{
$main_id = $_GET['id'];
$sql = mysqli_query($conn,"UPDATE message SET status=1 WHERE id='$main_id'");
}

 ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <link rel="stylesheet" href="css/style.css">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container" id="table">
    <div class="row">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S.N</th>
            <th scope="col">Name</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
      $sn=1;
     $sql = mysqli_query($conn,"SELECT * FROM message WHERE status = 1");
     while($main_result = mysqli_fetch_assoc($sql))
     {
     ?>
          <tr>
            <th scope="row"><?php echo $sn++; ?></th>
            <td><?php echo $main_result['name']; ?></td>
            <td><?php echo $main_result['message']; ?></td>
            <td><?php echo $main_result['cr_date']; ?></td>
            <td><a href="delete.php?id=<?php echo($main_result['id']);?>" class="text-danger"><i
                  class="fas fa-trash-alt"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>


    </div>

  </div>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>