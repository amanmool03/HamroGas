
	<?phpi include("connect.php");?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		
		

	</head>
	<body>
		<!-- <div id="waste"></div> -->
		<section>
			<div id="main">
				<div class="bar" ><P style="margin-top: 0px;text-align: center;padding-top: 10px;font-size: 20px;position: relative;">DASHBOARD</P>
					<div style=" position: absolute;top: 12px;margin-left: 66%;">

						<span>   
			<ul class="nav navbar-nav navbar-right"> 
	     <li class="dropdown"> 
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0px; " aria-expanded="false"><span class="label label-pill label-danger count" style="border-radius:20%;position:absolute;bottom:10px;margin-left: 10px;padding: 3.150px 4px 4px 3.150px;""></span><span> <i class=" far fa-bell" style="font-size:15px; margin-right: 0px;"></i></span></a> 
	       <ul class="dropdown-menu"></ul>
	  </li>
	      </ul><?php include('index.php')?> </span>

						<!-- <a href="notification.php"><i class="fas fa-comment-dots"></i></a><a href="message.php"><i class="fas fa-sign-out-alt"></i></a> --></div>
			<div style=" position: absolute;top: 12px;margin-left: 70%;">
						<span>   
			<ul class="nav navbar-nav navbar-right"> 
	     <li class="dropdown"> 
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0px; " aria-expanded="false"><span class="label label-pill label-danger count" style="border-radius:20%;position:absolute;bottom:10px;margin-left: 10px;padding: 3.150px 4px 4px 3.150px;"></span><span> <i class=" far fa-comment" style="font-size:15px; margin-right: 0px;"></i></span></a> 
	       <ul class="dropdown-menu"></ul>
	  </li>
	      </ul></div>
	      <div style="position: absolute;top: 5px;margin-left: 74%;">
	      <a href="logout.php" class="btn btn-default">Logout</a></div>
	       <div style="position: absolute;top: 5px;margin-left: 82%;">
		  <button  class="modal-btn" style="background-color: #101820ff !important;
	color: white;border-style: none;padding: 7px;border-radius: 3px;">Product</button></div>

		<?php
		
		require_once('p.php');?>
	
     <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
					<div class="item">
						<div class="item1">
							<div style="float: left;">
								<h1 > Sold out!!!</h1>
								<p >1520</p>
							</div>
							<div style="float: left; "><i class="fas fa-clipboard-list"  style="color: white; font-size:4vw; margin-top: 8px;"></i></div></div>
							<div class="item2">
								<div style="float: left;">
									<h1>Stock</h1>
									<p>2500.</p></div>
									<div style="float: left; "><i class="fas fa-cubes"  style="color: white; font-size: 4vw; margin-top: 8px;"></i></div></div>
									<div class="item3">
										<div style="float: left;">
											<h1>User</h1>
											<p>5 New User.</p></div>
											<div style="float: left; "><i class="fas fa-user-circle"  style="color: white; font-size: 4vw; margin-top: 8px;"></i></div></div>
											<div class="item4">
												<div style="float: left;">
													<h1>Notification</h1>
													<p>1 Notification</p>
													<!-- <P><?php ?>
													<script>
														document.write($data.unseen_notification);
													</script> -->
													</P>
												</div>
												<div style="float: left; "><i class="fas fa-bell"  style="color: white; font-size: 4vw; margin-top: 8px;"></i></div>

											</div>
											<!-- <div class="item4"><img src="images/gas.gif" style="width: 100%;"></div> -->
											<!-- </div> --> 

											<!-- ///////////////////////////////////////////////////////////////////////////////1st graph//////////////////////////////////////////////////// -->

											<div id="graph" >	

												<div id="itemm5">
													<h2 style="margin: auto;color:#F2AA4CFF;margin:5px 0px 0px 15px;">Comment</h2><hr>
																<?php include('connect.php');
													$sql = "SELECT * FROM message ORDER BY id DESC LIMIT 6"; 
													$result = mysqli_query($conn, $sql);
													$output = '';
													if(mysqli_num_rows($result)>0)
													{
														while ($row = mysqli_fetch_assoc($result)) {
															  $output .= '
																  <li>
																   <strong>'.$row["name"].'</strong>:
																  <small><em>'.$row["message"].'</em></small>												 
																  <hr>
																  </li>';

  														

													} 
														echo $output;
												}?>


												
													
													   									
												</div>			

												<div id="itemm1">
													<h2 style="margin: auto;color: #F2AA4CFF;">Line Graph</h2>
													<hr>
													<canvas id="myChart1" ></canvas> 
													<script type="text/javascript">


														var ctx = document.getElementById("myChart1"); 
														var myChart = new Chart(ctx, { 
															type: 'line', 
															data: { 
																labels: ["CS", "IT" , "ECE" , "EE", "ME", "BE"], 
																datasets: [ 
																{ label: '# of students', 
																type: 'line', 
																data: [150,120,194,20,30,40],
																backgroundColor :['rgba(255, 99, 132, 0.2)', 
																'rgba(54, 162, 235, 0.2)', 
																'rgba(255, 206, 86, 0.2)', 
																'rgba(75, 192, 192, 0.2)', 
																'rgba(153, 102, 255, 0.2)', 
																'rgba(255, 159, 64, 0.2)' 
																], 


																borderColor: [ 
																'rgba(255,99,132,1)', 
																'rgba(54, 162, 235, 1)', 
																'rgba(255, 206, 86, 1)', 
																'rgba(75, 192, 192, 1)', 
																'rgba(15, 102, 255, 1)', 
																'rgba(255, 154, 64, 1)' 
																], 
																borderWidth : 2

															},
															{ type: 'line', 
															data: [150,10,14,20,130,140],
															backgroundColor :['rgba(200, 99, 132, 0.5)', 
															'rgba(54, 162, 235, 0.5)', 
															'rgba(25, 265, 86, 0.5)', 
															'rgba(75, 192, 192, 0.5)', 
															'rgba(15, 10, 220, 0.5)', 
															'rgba(255, 159, 6, 0.5)' 
															], 



															borderColor: [ 
															'rgba(255,99,132,1)', 
															'rgba(54, 162, 235, 1)', 
															'rgba(255, 206, 86, 1)', 
															'rgba(75, 192, 192, 1)', 
															'rgba(15, 102, 255, 1)', 
															'rgba(255, 154, 64, 1)' 
															], 
															borderWidth : 2}
															] 

														}, 



														options: { 
															responsive:true,
															maintainAspectRatio:false,
															scales: { 
																yAxes: [{ 
																	ticks: { 
																		beginAtZero:true 
																	} 
																}] 
															} 
														} 
													}); 


												</script> 

											</div>


											<!-- ///////////////////////////////////////////////////////////2nd graph//////////////////////////////////////////////////// -->
											<div id="itemm2" style="margin-top: 50px;">
												<h2 style="margin: auto;color:#F2AA4CFF;margin:5px 0px 0px 15px;">Doughnut</h2>
												<hr>						  						  
												<canvas id="myChart2" ></canvas> 
												<script type="text/javascript"> 

													var ctx = document.getElementById("myChart2"); 
													var myChart = new Chart(ctx, { 
														type: 'doughnut', 
														<?php include('graph2.php')  ?>

													</script> </div>
													<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
													<div id="itemm3" style="margin-top: 50px;" >
														<h2 style="margin: auto;color:#F2AA4CFF;margin:5px 0px 0px 15px;">Pie-Chart</h2>
														<hr> 
														<canvas id="myChart3" ></canvas> 
														<script type="text/javascript"> 

															var ctx = document.getElementById("myChart3"); 
															var myChart = new Chart(ctx, { 
																type: 'pie', 
																<?php include('graph2.php')  ?>

															</script> 

														</div>
														<div id="itemm4" style="margin-top: 23px;">
															<h2 style="margin: auto;color:#F2AA4CFF;margin:5px 0px 0px 15px;">Bar</h2>
															<hr>
															<canvas id="myChart4" ></canvas> 
															<script type="text/javascript"> 

																var ctx = document.getElementById("myChart4"); 
																var myChart = new Chart(ctx, { 
																	type: 'bar', 
																	<?php include('graph2.php')  ?>

																</script> 

															</div>
														</div> 	
													</div>
												</section>

											</body>
											</html>
											