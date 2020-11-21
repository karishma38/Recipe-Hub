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


.text-block {
  position: relative;
  width: 600px;
  margin-top: 50px;
  margin-left: 50px;
  margin-bottom: 20px;
  background-color: transparent;
  color: white;
}

.video{
  margin-left: 50px;
  width: 560px;
  height: 315px;
}

@media (max-width: 426px){
  .text-block{
    width: 90%;
    margin: 20px auto;
    background-color: #00000075;
  }
  .video{
    width: 90%;
    margin-left: 5%;
    height: 200px;
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
  <li class="active"><a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
  <li><a href="contact.php"><i class="fa fa-headphones" aria-hidden="true"></i> Contact</a></li>
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
  <li class="navlist"><a class="active" href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
  <li class="navlist"><a href="contact.php"><i class="fa fa-headphones" aria-hidden="true"></i> Contact</a></li>
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
    <h2><strong>A Few Words About Us..</strong></h2>
    <p>Food has always been an integral part of everyone
    	 Be it a party, a get-together, trips, brunch, work-meals.
      it has always brought people together.My Friends and I are trying to maintain this food culture.
    	As a result we came with the idea of this website.
    	We want people to be able to make something special for their loved ones.
    	<br>Our Food roots are colourful, global and eclectic. We get inspired by the flavours and ingredients
      from all four corners of the world.
      <br>Our aim is to provide you with the best of recipes around.</p>
  </div>

<iframe class="video" src="https://www.youtube.com/embed/HOAAM-qE-8Y" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</body>
</html>

