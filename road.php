<!DOCTYPE html>
<html lang='en'>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width,initial-scale=1'>
<head>
<link rel="stylesheet" href="style.css" />
<title>Login</title>
</head>
<body style="background-color: #2778e2c5;">
<nav>
    <div class="logo">
      <img src="cargo.jpg" alt="cargoimage" style="width: 45px; height: 45px" />
      <h4><a href="index.html">INtime Cargo</a></h4>
    </div>
    <ul class="nav-links">
      <li>
        <a href="shipment.html">New Shipment</a>
      </li>
      <li>
        <a href="services.html">Services</a>
      </li>
      <li>
        <a href="track.html">Track</a>
      </li>
      <li>
        <a href="register.html">Find Work</a>
      </li>
    </ul>   
    <div class="rght">
    <div class="burger">
       <div class="line1"></div>
       <div class="line2"></div>
       <div class="line3"></div>
     </div>
    </div> 
  </nav>
<?php
if(isset($_POST["weight"])){
$link = mysqli_connect("localhost", "root", "", "intime");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$src = $_POST["source"];
$dest = $_POST["dest"];
$w = intval($_POST["weight"]);
$sql = "SELECT * FROM estimation WHERE source='".$src."' AND destination= '".$dest."'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          $baseprice = intval($row['base']);
          $totalcost = $baseprice*$w*1;
          echo "<div style='font-size: xx-large; display: flex; width: 85%; margin: auto; align-items: center;'>
          <div style='flex:1; align-items: center; margin-top: 5ch; background-color: rgb(50, 138, 0); color: #fbfbfb; border-radius: 0.75ch; font-weight: 750; padding: 1.25ch;'>
              <p style='text-align: center;'>The total estimated cost is RS. ".$totalcost." for the ".$w." kg cargo from ".$src." to ".$dest." </p>
              </div>
              </div>
                  <div style='font-size: xx-large; display: flex; width: 85%; margin: auto; align-items: center;'>
                  <a style='margin-top: 5ch; color: white; text-decoration: none; background-color: rgb(50, 138, 0); padding: 14px 20px; border: none; border-radius: 6px;' href='roadform.html'>Back to road cargo estimation.</a>
                  </div><br>";
        }
        mysqli_free_result($result);
    } else{
        echo "There is an error.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
mysqli_close($link);
?>
<script src="app.js"></script>
</body>
</html>