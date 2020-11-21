<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recipe Hub</title>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="recipe_styles.css">
	<style>

.container {
  position: relative;
  font-family: Arial;
}


.text-block {
  position: relative;
  width: 600px;
  margin-top: 50px;
  margin-left: 50px;
  margin-bottom: 20px;
  background-color: transparent;
  color: white;

}

body {
  font-family: "Raleway", sans-serif;
  font-size: 1rem;
  line-height: 1.6;
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  background-image: url("img/bg2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.text {
  margin-top: 20px;
  color: #fff;
  font-weight: bold;
  margin-left:50px; 
  height: 300px;
 } 
 .btn { 
  height: 40px;
 } 

.btn:hover {
  background-color: red;
  color: white;
}
#table{
  margin-left: 50px;
  overflow-x:auto;
}

  @media (max-width: 426px){
    .text-block, .text{
      width: 90%;
      margin: 20px auto;
    }
    #table{
      margin: 20px;
    }
  }
</style>


</head>



<body>
<div id="sidenav">
<ul>
  <li><img src="img/recipehub.png" id="logoimg" height="70px" width="120px"></li>
  <li><a onclick="closeNav()" style="font-size: 1.5em;">&times;</a></li>
  <li><a href="recipe_trial.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li><a href="allrecipes.php"><i class='fa fa-cutlery' aria-hidden='true'></i> Recipes</a></li>
  <li><a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
  <li class="active"><a href="contact.php"><i class="fa fa-headphones" aria-hidden="true"></i> Contact</a></li>
  <?php
      if(isset($_SESSION['username'])){
        echo "<li><a href='user.php'><i class='fa fa-cutlery' aria-hidden='true'></i> My recipes</a></li>";
        echo "<li><a href='logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i> Log Out</a></li>";

      }else{
        echo "<li><a href='landing.php'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a></li>";
      }
  ?>
  
</ul>
</div>
<script>
  function openNav() {
  document.getElementById("sidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("sidenav").style.width = "0";
}
</script>

<div class="navbar">
  <div class="logo">
    <img src="img/recipehub.png" id="logoimg" height="70px" width="120px">
  </div>
  <button id="menu" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></button>
<ul id="navlist">
  <li class="navlist"><a href="recipe_trial.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li class="navlist"><a href="allrecipes.php"><i class='fa fa-cutlery' aria-hidden='true'></i> Recipes</a></li>
  <li class="navlist"><a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
  <li class="navlist"><a class='active' href="contact.php"><i class="fa fa-headphones" aria-hidden="true"></i> Contact</a></li>
  <li class="navlist" id='dropbtn'>
  <?php
      if(isset($_SESSION['username'])){
        echo "<a><i class='fa fa-user' aria-hidden='true'></i> welcome ".$_SESSION['username']." <i class='fa fa-angle-double-down' aria-hidden='true'></i></a>";
        echo "<div class='dropdown-content'>";
        echo "<a href='user.php'><i class='fa fa-cutlery' aria-hidden='true'></i> My recipes</a>";
        echo "<a href='logout.php'><i class='fa fa-sign-out' aria-hidden='true'></i> Log Out</a>";
        echo "</div>";
        
      }else{
        echo "<a href='landing.php'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>";
      }
  ?>
  </li>
</ul>
</div>
  
  <div class="text-block">
    <h1><b>Contact</b></h1>
    <p>
      We'd love to hear from you.
      <br>We make sure to maintain the website consistently.
      <br>We want to satisfy our viewers with the content.
      <br>If you have a question or concern regarding Recipe Hub, 
      we are always available to clear your doubts.<br>
      <br>
      You can Email us on <strong>recipehub11@gmail.com</strong><br>Or<br>
      You can Contact us on <strong>022-23576590</strong>
    </p><br>
  </div>
  
    <div id="table">
    <h2>Student list.</h2>
    <div style="overflow-x:auto;">
        <?php
          $xml = new DOMDocument();
          $xml->load("members.xml");
          
          $xsl= new DOMDocument();
          $xsl->load('members.xsl');

          $xslt = new XSLTProcessor;
          $xslt->importStyleSheet($xsl);
          print $xslt->transformToXML($xml);
        ?>
    </div>
  </div>
<div class="text">
<p>Click the button to get your coordinates.</p>
    <button type="button" class="btn" onclick="getLocation()">
      Click Here
    </button>
    <p id="coordinate"></p>
    <p id="data"></p>
</div>

<script>
 var x = document.getElementById("coordinate");
    var y = document.getElementById("data");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      x.innerHTML =
        "Latitude: " +
        position.coords.latitude +
        "<br>Longitude: " +
        position.coords.longitude;

      //Create query for the API.
      var latitude = "latitude=" + position.coords.latitude;
      var longitude = "&longitude=" + position.coords.longitude;
      var query = latitude + longitude + "&localityLanguage=en";

      const Http = new XMLHttpRequest();

      var bigdatacloud_api =
        "https://api.bigdatacloud.net/data/reverse-geocode-client?";

      bigdatacloud_api += query;

      Http.open("GET", bigdatacloud_api);
      Http.send();

      Http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
          console.log(myObj);
          y.innerHTML += "State = "+myObj.principalSubdivision + "<br>City = " + myObj.city + "<br>Country = " + myObj.countryName;
        }
      };
    }

</script>
</body>
</html>