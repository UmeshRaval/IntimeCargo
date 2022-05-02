<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width,initial-scale=1'>
<head>
<link rel="stylesheet" href="style.css" />
<title>Login</title>
</head>
<body style="background-color: #2778e2c5;">
<?php
if(array_key_exists('logout', $_POST)){
  $_SESSION["stay"]=false;
  setcookie("logck", "", time()-(60*60*24*7));
  setcookie("name", "", time()-(60*60*24*7));
  session_unset();  
}
if(isset($_SESSION["stay"])){
  $stay = $_SESSION["stay"];
}
else{
  $stay = false;
}
if(isset($_COOKIE["logck"]) && $stay==true){
  $_SESSION["logged_in"]=true;
  $_SESSION["user"]=$_COOKIE["name"];
}else{
 if(array_key_exists('uname', $_POST)){
  if(!isset($_SESSION["logged_in"])){
    $_SESSION["logged_in"]= true;
    $_SESSION["user"]=$_POST["uname"];
    if(isset($_POST["rem"])){
      if($_POST["rem"]){
        setcookie("name",$_POST["uname"]);
        setcookie("logck",true);
        $_SESSION["stay"]=true;
      }else{
        $_SESSION["stay"]=false;
        setcookie("logck", "", time()-(60*60*24*7));
        setcookie("name", "", time()-(60*60*24*7));
      }
    }
  }
 }
}
?>
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
        <a href="sign.html">Sign Up</a>
      </li>
      <li>
        <a href="track.html">Track</a>
      </li>
      <li>
        <a href="register.html">Find Work</a>
      </li>
    </ul>   
    <div class="rght">
     <?php  
      if(isset($_SESSION["logged_in"])){
        echo "<div class='logit'><form method='post'>"; 
         echo"
           <input type='submit' name='logout' value='Logout'/>
           </form>
           </div>
          ";
      }else{
        echo "<div class='logsign'>"; 
        echo"
           <a href='login.php'>Login</a>
           <span>/</span>
           <a href='sign.php'>Signup</a>
           </div>
          ";
      }
     ?>
     <div class="burger">
       <div class="line1"></div>
       <div class="line2"></div>
       <div class="line3"></div>
     </div>
    </div>
  </nav>

<?php
if(!isset($_SESSION["logged_in"])){
  echo '
  <div class="validation"><br><br><br>
    <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLogin</h2>
    <form name="acc" id="acc" method="post" action="login.php" class="account">
      <label for="fname">Username: </label>
      <input type="text" id="uname" name="uname" required><br><br>
      <label for="fname">Password: </label>
      <input type="password" id="pass" name="pass" required><br><br>
      <input type="checkbox" checked="checked" name="rem" style="width:25px; height:25px; vertical-align: -40%; outline: none;">
      <label style="width: 168px;">Remember Me</label><br>
      <input type="submit" id="subm" value="Login">
      
    </form>
  </div>
  ';
}
else{
  echo "<div class='validation'><br><br><br><h2>Welcome!</h2><form method='post'><label style='width: 700px;'>You are currently logged in as ".$_SESSION["user"]." </label><br><br>"; 
  echo"
    </form>
    </div>
  ";
}
?>
<script src="app.js"></script>
</body>
</html>