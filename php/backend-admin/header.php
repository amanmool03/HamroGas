<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/a.css">
 
  <script type="text/javascript">
      var mini = true;

function hover() {
  if (mini) {
    console.log("opening sidebar");
    document.getElementById("mySidebar").style.width = "150px";
      document.getElementById("main").style.marginLeft = "150px";
    this.mini = false;
  } else {
    console.log("closing sidebar");
    document.getElementById("mySidebar").style.width = "75px";
     document.getElementById("main").style.marginLeft = "75px ";
   // document.getElementById("graph").style.marginLeft = "180px";
    this.mini = true;
  }
}
    </script>
</head>
<body>

    <nav>
        
       <div id="mySidebar" class="sidebar" onmouseover="hover()" onmouseout="hover()" style="padding-top: 0px;">
        <!-- <p style="color: yellow;top: 0px;font-size: 1vw;" >HAMRO GAS</p> -->
      
          <div class="profile" >
              <hr>
          <a href="profile.html" style="padding-left: 30%;"><i class="fas fa-user-circle" style="font-size: 40px;"></i></a>
          <a href="profile.php" style="padding-left: 15%;"><p>User name</p></a>
        <hr>
      </div>

              <table>
                <tr><td ><a href="a.html"><i class="fas fa-home"  ><span class="icon"></span><span class="icon-text">Home</span></a></td></tr>
                <tr><td ><a href=""><i class="far fa-chart-bar"></i><span class="icon"></span><span class="icon-text">Chart</span></a></td></tr>
                <tr><td ><a href=""><i class="fas fa-table"></i><span class="icon"></span><span class="icon-text">Table</span></a></td></tr>
                <tr><td><a href=""><i class="far fa-edit"  ></i><span class="icon"></span><span class="icon-text">Edit</span></a></td></tr>
                <tr><td><a href=""><i class="fas fa-search" ></i><span class="icon"></span><span class="icon-text">Search</span></a></td></tr>
                <tr><td><a href="map.php"><i class="fas fa-map-marker-alt"></i><span class="icon"></span><span class="icon-text">Maps</span></a></td></tr>
                <tr><td><a href=""><i class="fas fa-cog" ></i><span class="icon"></span><span class="icon-text">Setting</span></a></td></tr>

        </table>
   
  </div>
    </nav>


      

</body>
</html>


