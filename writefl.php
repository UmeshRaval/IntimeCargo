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
$fw = fopen('shipment.txt','w');
if(!empty($_POST['name'])){
    fwrite($fw, 'Shipment Name: '.$_POST['name'].PHP_EOL);
}
if(!empty($_POST['from'])){
    fwrite($fw, 'Shipment Source: '.$_POST['from'].PHP_EOL);
}
if(!empty($_POST['to'])){
    fwrite($fw, 'Shipment Destination: '.$_POST['to'].PHP_EOL);
}
if(!empty($_POST['weight'])){
    fwrite($fw, 'Shipment Weight: '.$_POST['weight'].PHP_EOL);
}
if(!empty($_POST['volume'])){
    fwrite($fw, 'Shipment Volume: '.$_POST['volume'].PHP_EOL);
}
if(isset($_POST['fragile'])){
    fwrite($fw, 'Shipment is fragile.');
}else{
    fwrite($fw, 'Shipment is not fragile.');
}
fclose($fw);
echo "<div style='font-size: xx-large; display: flex; width: 85%; margin: auto; align-items: center;'>
        <div style='flex:1; margin-top: 5ch; background-color: rgb(50, 138, 0); color: #fbfbfb; border-radius: 0.75ch; font-weight: 750; padding: 1.25ch;'>
            <p style='text-align: center;'>Shipment file was created succesfully.</p>
        </div>
      </div>
      <div style='font-size: xx-large; display: flex; width: 85%; margin: auto; align-items: center;'>
        <a style='margin-top: 5ch; color: white; text-decoration: none; background-color: rgb(50, 138, 0); padding: 14px 20px; border: none; border-radius: 6px;' href='shipment.html'>Create another Shipment</a>
      </div>
";
?>
<script src="app.js"></script>
</body>
</html>