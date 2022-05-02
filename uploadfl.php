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
if(isset($_POST["name"])){
$link = mysqli_connect("localhost", "root", "", "intime");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = $_POST["name"];
$fname = $_FILES["cvup"]["name"];
$email = $_POST["email"];
$goals = $_POST["goals"];
$position = $_POST["posi"];
$sql = "INSERT INTO appl VALUES ('$name','$email', '$goals', '$fname', '$position') ";
if(isset($_FILES["cvup"])){
  $errors = array();
  $fileName=$_FILES["cvup"]["name"];
  $fileSize=$_FILES["cvup"]["size"];
  $fileType=$_FILES["cvup"]["type"];
  $fileTmpName=$_FILES["cvup"]["tmp_name"];
  $file_plod = explode('.', $fileName);
  $file_ext = strtolower(end($file_plod));
  $extensions = array('jpeg','jpg','png','pdf','doc','docx');
  
  if(in_array($file_ext,$extensions)=== false){
      $errors[] = "extension is not allowed, allowing only: jpeg, jpg, png, pdf, doc, docx files.";
  }

  if($fileSize > 2097152){
      $errors[] = "File size must be less than 2MB.";
  }
  if(empty($errors)==true){
      move_uploaded_file($fileTmpName, '/Applications/'.$fileName);
      echo "<div style='font-size: xx-large; display: flex; width: 85%; margin: auto; align-items: center;'>
      <div style='flex:1; margin-top: 5ch; background-color: rgb(50, 138, 0); color: #fbfbfb; border-radius: 0.75ch; font-weight: 750; padding: 1.25ch;'>
          <p style='text-align: center;'>File was succesfully uploaded.</p>";
  }else{
      print_r($errors);
  }
}else{
    echo ' ERROR ';
}
if(mysqli_query($link, $sql)){
  echo "<div style='font-size: xx-large; display: flex; width: 85%; margin: auto; align-items: center;'>
  <div style='flex:1; margin-top: 5ch; background-color: rgb(50, 138, 0); color: #fbfbfb; border-radius: 0.75ch; font-weight: 750; padding: 1.25ch;'>
      <p style='text-align: center;'>Your application was succesful.</p>";
}else{
  echo "Data was not inserted.";
}
mysqli_close($link);
}
?> 
<script src="app.js"></script>
</body>
</html>