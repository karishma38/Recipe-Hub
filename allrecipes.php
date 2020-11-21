<?php
    session_start();
    require_once "pdo.php";
    if(isset($_GET['category'])){
        $stmt = $pdo->prepare("SELECT * FROM `dishes` WHERE `category`=:category ORDER BY `name`");
        $stmt->execute(array(":category" => $_GET['category']));
    }
    elseif(isset($_GET['search'])){
        $search= $_GET['search'];
        $stmt = $pdo->prepare("SELECT * FROM `dishes` WHERE `name` LIKE '$search%' ORDER BY `name`");
        $stmt->execute();
    }
    else{
        $stmt = $pdo->prepare("SELECT * FROM `dishes` ORDER BY `name`");
        $stmt->execute();
    }

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Recipe Hub</title>
 		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="recipe_styles.css">
<style>
  #searchbox{
    width: 400px;
    margin: 0 auto;
    position: relative;
  }
  #search{
    width: 100%;
    border: 2px solid #999999;
    border-radius: 50px;
    font-size: 16px;
    background-color: transparent;
    padding: 12px 50px 12px 20px;
    margin: 10px 0;
    outline: none;
  }
  .searchicon{
    position: absolute;
    color: #888888;
    font-size: 22px;
    padding: 12px 20px 12px 12px;
    margin: 10px 0;
    right: 0;
  }
  #search:focus{
    border: 2px solid #000;
  }
  #search:focus + .searchicon{
    color: #000;
  }
  @media (max-width: 426px){
    #searchbox{
    width: 90%;
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
  <li class="active"><a href="allrecipes.php"><i class='fa fa-cutlery' aria-hidden='true'></i> Recipes</a></li>
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
  <li class="navlist"><a href="recipe_trial.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
  <li class="navlist"><a class='active' href="allrecipes.php"><i class='fa fa-cutlery' aria-hidden='true'></i> Recipes</a></li>
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
<div class="recipes">
  <div id="searchbox">
    <form>
      <input id="search" type="text" name="search" placeholder="Search Your Favorite Food.."><i class="fa fa-search searchicon" aria-hidden="true"></i>

    </form>
  </div>
    <center><h2 style="margin: 30px;font-size: 3rem;">
    <?php
    if(isset($_GET['category'])){
        echo $_GET['category'];
    }else{
        echo 'All recipes';
    }
    ?>
    </h2></center>
    <div class="list">
    <?php
        
        if ( count($rows) == 0) {
            echo ("<p style='margin:10px;'>no recipes</p>");
        }
        else{
            foreach( $rows as $row ) {
                ?>
                <div class="recipe_card">
                    <div class="dish_img">
                        <a href="recipe.php?id=<?=$row['id']?>">
                            <img class="dishimg" src="<?=$row['image']?>" height="100%" width="100%" >
                        </a>
                    </div>
                    <div class="dish_info">
                        <div class="dishname" style="margin: 10px 0;">
                        <h4 ><a href="recipe.php?id=<?=$row['id']?>" class="dish_name"><?=$row['name']?></a></h4>
                        <a class="chefname" href="#"><img src="img/chefhat.png" alt="" width="20" height="20"> By <?=$row['uploded_by']?></a>
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