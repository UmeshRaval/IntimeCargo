<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <style>
      * {
          margin: 0px;
          padding: 0px;
          box-sizing: border-box;
        }
      .welcome {
          font-size: larger;
          display: flex;
          width: 75%;
          margin: auto;
          min-height: 45vh;
          align-items: center;
        }
      
        .welcome img {
          margin-left: 10%;
        }
      
        .services {
          font-size: larger;
          display: flex;
          width: 75%;
          margin: auto;
          min-height: 45vh;
          align-items: center;
        }
        .provide {
          margin-left: 10%;
          align-items: flex-start;
        } 
      </style>
    <title>INtime Cargo</title>
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
     <?php  
      if(isset($_SESSION["logged_in"])){
        echo "<div class='logit'><form method='post'>"; 
         echo"
           <input type='submit' name='logout' value='Logout'/>
           </form>
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
    <div class="welcome">
     <div class="intro-text" style="background-color: rgb(50, 138, 0); color: #fbfbfb; border-radius: 0.75ch; font-weight: 750; padding: 1.25ch;">
      <h2><div class="alert alert-success" role="alert">Shipping made easy</div></h2>
            <p>
              We provide the lowest shipping rates, widest reach and the best customer service.
              <br>Grow your ecommerce business and reduce cost.
            </p>
     </div>
     <img src="truck.png" alt="truck">
    </div>
      <div class="services"> 
       <img src="services.gif" alt="service">
        <div class="provide" style="background-color: rgb(50, 138, 0); color: #fbfbfb; border-radius: 0.75ch; font-weight: 750; padding: 1.25ch;">
          <h2><div class="alert alert-success" role="alert">Services</div></h2>
          <p>
            We provide parcel transportation, warehousing, freight, reverse logistics, cross-border and technology services to over 10000 customers including all of India’s largest e-commerce companies and leading enterprises.<br> Our supply chain platform and logistics operations bring flexibility, breadth, efficiency and innovation to our customers’ supply chain and logistics operations. Our operations, infrastructure and technology enable our customers to transact with us and our partners at the lowest costs.
          </p>
        </div>
      </div>
  <script src="app.js"></script>
</body>
</html>