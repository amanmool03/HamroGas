
<?php include("include/header.php"); ?>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <script type="text/javascript">
    function confirm(id1){

              Swal.fire({
                  title: 'Are you sure?',
                  text: "Do you sure want to go to Delete this message??",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Delete now'
                }).then((result) => {
                  if (result.value) {     
                    Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        ) .then((result) => {
                                if (result.value) {
                                 // 
                                 window.location.href = "delete.php"+"?mask="+id1;
                                }
                                 // 
                                })    
                        
                  }
                 
                })

    }
  </script>


  <div class="main_body"> 
    <div class="sidebar_menu">
          <div class="inner__sidebar_menu">

            <ul>
              <li>
                <a href="index.php">
                  <span class="icon">
                    <i class="fas fa-border-all"></i></span>
                  <span class="list">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#" class="">
                  <span class="icon"><i class="fas fa-chart-pie"></i></span>
                  <span class="list">Charts</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-address-book"></i></span>
                  <span class="list">Contact</span>
                </a>
              </li>
              <li>
                 <button class="dropdown-btn" >   
                    <span class="icon"><i class="fas fa-truck-loading"></i></span>
                    <span class="list">Delivery staff</span>
                    <span class="down"><i class="fa fa-caret-down"></i></span>
                    
                  </button>

                  <div class="dropdown-container" style="display: inline-block; width: 100%;" >
                     <a href="add_deliveryStaff.php" >
                      <span class="icon"><i class="fas fa-plus"></i></span>     
                      <span class="list">Add</span>
                    </a>
                      <a href="manage_deliveryStaff.php" style="background: #5343c7; padding:10px 35px; color: #fff;" >
                        <span class="icon"><i class="fas fa-cog"></i></span> 
                        <span class="list">Manage</span>
                      </a>
                  </div>
              </li>
                   <li>
                 <button class="dropdown-btn" >   
                    <span class="icon"><i class="far fa-comments"></i></span>
                    <span class="list">Message</span>
                    <span class="down"><i class="fa fa-caret-down"></i></span>
                    
                  </button>

                  <div class="dropdown-container" >
                     <a href="displayMessage.php" >
                      <span class="icon"><i class="far fa-comments"></i></span>     
                      <span class="list">All messages</span>
                    </a>
                      <a href="unseenmsg.php">
                        <span class="icon"><i class="fas fa-cog"></i></span> 
                        <span class="list">Unseen Messages</span>
                      </a>
                  </div>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-address-card"></i></span>
                  <span class="list">About</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fab fa-blogger"></i></span>
                  <span class="list">Blogs</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-map-marked-alt"></i></span>
                  <span class="list">Maps</span>
                </a>
              </li>
            </ul>

            <div class="hamburger">
              <div class="inner_hamburger">
                  <span class="arrow">
                      <i class="fas fa-long-arrow-alt-left"></i>
                      <i class="fas fa-long-arrow-alt-right"></i>
                  </span>
              </div>
          </div>

          </div>
      </div>

         <div class="container">

<nav aria-label="breadcrumb" style="margin-bottom: 25px;">
  <ol class="breadcrumb" style="background-color: #dce1e9;">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Messages</li>
  </ol>
</nav>

      <div class="row justify-content-center " >
      <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S.N</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Adress</th>
            <th scope="col">Contact</th>
            <th scope="col">City</th>
            <th scope="col">zip</th>
             <th scope="col">Created At</th>
              <th scope="col">Status</th>
            <th scope="col">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
      $sn=1;
     $sql = mysqli_query($conn,"SELECT * FROM delivery_boy");
     while($main_result = mysqli_fetch_assoc($sql))
     {
     ?>
          <tr>
            <th scope="row"><?php echo $sn++; ?></th>
            <td><?php echo $main_result['name']; ?></td>
            <td><?php echo $main_result['username']; ?></td>
            <td><?php echo $main_result['email']; ?></td>
            <td><?php echo $main_result['address']; ?></td>
            <td><?php echo $main_result['contact']; ?></td>
            <td><?php echo $main_result['city']; ?></td>
             <td><?php echo $main_result['zip']; ?></td>
              <td><?php echo $main_result['created_at']; ?></td>
               <td><?php  
                     if($main_result['status']==1){echo "available";} 
                     else{echo "Not available";}
                    ?></td>
         <!--    <td><a href="delete.php?id=<?php// echo($main_result['id']);?>" class="text-danger"><i
                  class="fas fa-trash-alt"></i></a></td> -->
                <td align="center">
                  <a  href="edit_deliveryStaff.php?id=<?= $main_result['id'];?>" style="cursor: pointer; margin-right: 10px; color: #2f2f2f; "><i class="fas fa-eye"></i></a>
                  <a onclick="confirm(<?php echo($main_result['id']);?>);" style="cursor: pointer; color:#dd3e4e;"><i class="fas fa-trash-alt"></i></a>
                </td>      
          </tr>
          <?php } ?>
        </tbody>
      </table>


    </div>


      </div>
  </div>
</div>
  

 <?= include("include/footer.php");?>







