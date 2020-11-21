<?php
  session_start();
  require_once "pdo.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Recipe Hub</title>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="recipe_styles.css">
   
</head>
<body>
<div id="sidenav">
<ul>
  <li><img src="img/recipehub.png" id="logoimg" height="70px" width="120px"></li>
  <li><a onclick="closeNav()" style="font-size: 1.5em;">&times;</a></li>
  <li class="active" ><a href="recipe_trial.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li><a href="allrecipes.php"><i class='fa fa-cutlery' aria-hidden='true'></i> Recipes</a></li>
  <li><a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
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
  <li class="navlist"><a class='active' href="recipe_trial.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li class="navlist"><a href="allrecipes.php"><i class='fa fa-cutlery' aria-hidden='true'></i> Recipes</a></li>
  <li class="navlist"><a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
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

<div class="slideshow-container">
<div class="name">
<div class="title">RECIPE HUB</div>
  <h3 class="tagline">"Good Food 
  	<div>for Every Mood"</div>
</div>

<div class="mySlides fade">
  <img class="slide_img" src="img/slider4.jpg" style="width: 100%">
  

</div>

<div class="mySlides fade">
  <img class="slide_img" src="img/slider2.jpg" style="width: 100%">
  
</div>

<div class="mySlides fade">
  <img class="slide_img" src="img/slider1.jpg" style="width: 100%">
  
</div>

</div>

<div style="text-align:center;margin-top: 5px;">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>


<div class="info">
	<p>Welcome to the Recipe Hub. This place is sure to bring you deightful flavours
	into your life. Food is something that is enjoyed anytime. We hope to bring
the best food recipes from around to be enjoyed by you. One cannot think well, live well
 or sleep well, if one has not Dined well. Food brings people together on many different
 levels. Our website will surely try its best to provide an amazing experience. </p>


</div>

<div class="category">
    <div class="card">
        <a href="allrecipes.php?category=Main-Course">
          <div class="imgwrap">
            <img src="img/mc2.jpg" alt="" width="100%" height="100%">
            <h4 class="category_name">Main Course</h4>
        </div></a>
    </div>
    <div class="card">
        <a href="allrecipes.php?category=Dessert">
          <div class="imgwrap">
            <img src="img/d1.jpg" alt="" width="100%" height="100%">
            <h4 class="category_name">Dessert</h4>
        </div></a>
    </div>
    <div class="card">
        <a href="allrecipes.php?category=Beverages">
          <div class="imgwrap">
            <img src="img/b1.jpg" alt="" width="100%" height="100%">
            <h4 class="category_name">Beverages</h4>
        </div></a>
    </div>
    <div class="card">
        <a href="allrecipes.php?category=Healthy">
          <div class="imgwrap">
            <img src="img/s6.jpg" alt="" width="100%" height="100%">
            <h4 class="category_name">Healthy</h4>
        </div></a>
    </div>
</div>

<p class="label">OUR RECOMMENDATIONS</p>

<div class="list">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM `dishes` WHERE `uploded_by`='Editors choice' LIMIT 9");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ( count($rows) == 0) {
            echo ("<p style='margin:10px;'>you didn't added any recipes yet</p>");
        }
        else{
            foreach( $rows as $row ) {
                ?>
                <div class="recipe_card">
                    <div class="dish_img">
                        <a href="recipe.php?id=<?=$row['id']?>">
                            <img class="dishimg" src="<?=$row['image']?>" >
                        </a>
                    </div>
                    <div class="dish_info">
                        <div class="dishname" style="margin: 10px 0;">
                        <h4 ><a href="recipe.php?id=<?=$row['id']?>" class="dish_name"><?=$row['name']?></a></h4>
                        <a class="chefname" href="#"><img src="img/chefhat.png" class="chefhat" alt="" > By <?=$row['uploded_by']?></a>
                        </div>
                        <div class="dish_metadata">
                            <div class="meta"><?=$row['ready_in']?></div>
                            <div class="meta"><?=$row['serve']?> serve</div>
                        </div>
                    </div>
                </div>
                                
                <?php
            }
        }
    
    ?>
    
</div>

</body>
</html>