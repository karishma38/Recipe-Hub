<?php
  session_start();
   require_once "pdo.php";

    if(!isset($_SESSION['username'])){
        header( 'Location: landing.php' ) ;
        return;
    }

     if (isset($_POST['submit'])){
      //$image=addslashes(file_get_contents( $_FILES['img']['tmp_name']));
      $image = $_FILES['img']['name'];
  
      $name = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
      $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
      
      $target = "uploads/".$_SESSION['username']."_".$image;
      $i = 1;
      while(file_exists($target)) {
          $target = "uploads/".$_SESSION['username']."_".$name.$i.".".$extension;
          $i++;
      }
      if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
          $msg = true;
      }else{
          $msg = false;
      }

     	if($_POST['prep']=='other_time'){
     		$prep=$_POST['text_prep'];
     	}else{
     		$prep=$_POST['prep'];
     	}

        if($_POST['cook']=='other_time'){
     		$cook=$_POST['text_cook'];
     	}else{
     		$cook=$_POST['cook'];
     	}

		  if($_POST['ready']=='other_time'){
     		$ready=$_POST['text_ready'];
     	}else{
     		$ready=$_POST['ready'];
     	}

     	if($_POST['serving']=='other_time'){
     		$serve=$_POST['text_serving'];
     	}else{
     		$serve=$_POST['serving'];
     	}


       $stmt = $pdo->prepare("INSERT INTO `dishes`( `name`, `uploded_by`, `prep`, `cook`, `ready_in`, `category`, `serve`, `level`, `discription`, `nutritions`, `image`) VALUES(:name, :uploded_by, :prep, :cook, :ready_in, :category, :serve, :level, :discription, :nutritions, :image)");
       $stmt->execute(array(":name" => $_POST['recipe_title'], 
                 ":uploded_by" => $_SESSION['username'],
                 ":prep" => $prep,
                 ":cook" => $cook,
                 ":ready_in" => $ready,
                 ":category" => $_POST['category'],
                 ":serve" => $serve,
                 ":level" => $_POST['level'],
                 ":discription" => $_POST['description'],
                 ":nutritions" => $_POST['nutrition'],
                 ":image" => $target));

        $dish_id = $pdo->lastInsertId();
        $ingredient_rank=1;
        for ($i=1; $i<=100 ; $i++) 
    	  { 
        	if (!isset($_POST['ingredient'.$i])) continue;
        		
        	# code...
        $stmt = $pdo->prepare("INSERT INTO `ingredients`(`dish_id`, `rank`, `ingredients`) VALUES(:dish_id, :rank, :ingredients)");
        $stmt->execute(array(":dish_id" => $dish_id,
        					":rank" => $ingredient_rank,
        					":ingredients" => $_POST['ingredient'.$i]));
        $ingredient_rank++;
      }

      $direction_rank=1;
      for ($i=1; $i <100 ; $i++)
   		{
        if (!isset($_POST['step'.$i])) continue; 

        $stmt =$pdo->prepare("INSERT INTO `directions`(`dish_id`, `step`, `directions`) VALUES(:dish_id, :step, :directions)");
        $stmt->execute(array(":dish_id" => $dish_id,
                  ":step" => $direction_rank,
                  "directions" => $_POST['step'.$i]));
        
        $direction_rank++;
	    }
         
      header( 'Location: user.php' ) ;
      return;

    }

 
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recipe Hub</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="recipe_styles.css">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<style>
	
	.div1
	{
background: url(img/bg3size.jpg);
background-repeat: no-repeat;
background-size: auto 100%;
height: 300px;
background-color: black;
color: white;
font-size: 70px;
font-style: italic;
font-family: Arial;

	}

	.text{
		text-align: right;
    padding-left: 20px;
    padding-right: 220px;
    line-height: 300px;
  }
  .main{
    margin: 2rem auto;
    max-width: 750px;
    padding: 0px 20px;
  }
.field{
  margin: 2rem auto;
  width: 100%;
}
label{
  color: rgba(21, 21, 21, .7);
  font-weight: 600;
}
.grid{
  width: 100%;
  display: inline-flex;
  flex-wrap: wrap;
}
.grid .field{
  width: 50%;
  padding: 0px 20px;
}

	input[type=text], textarea {
  width: 100%;
  height: 50px;
  padding: 15px;
  margin: 8px 0;
  border: 2px solid #bfbfbf;
  border-radius: 10px;
  outline: none;
}

.btn, .delete{
  height: 50px;
  font-weight: 600;
  background-color: #528f2d;
  border: none;
  border-radius: 25px;
  padding: 0 20px;
  color: #fff;
  outline: none;
}
.delete{
  position: absolute;
  width: 50px;
  padding: 0;
  top: 50%;
  margin-left: 20px;
  transform: translateY(-25px);
  line-height: 50px;
  font-size: 30px;
}
.btn:hover, .delete:hover{
  background-color: #006400;
}

input[type=file]
{
	width: 100%; 
  border: 2px solid #bfbfbf;
  outline: none;
}

select {
  width: 100%;
  height: 50px;
  padding: 10px;
  margin: 8px 0;
  border: 2px solid #bfbfbf;
  border-radius: 10px;
  outline: none;
}

#submit {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
  font-weight: bold;
  font-style: italic;
  font-size: 16px;
  outline: none;
}

#submit:hover {
  background-color: green;
}

@media (max-width: 426px){
  .grid .field{
    width: 100%;
  }
  .delete{
    margin-left: 5px;
    line-height: 40px;
    width: 40px;
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
  <li><a href="contact.php"><i class="fa fa-headphones" aria-hidden="true"></i> Contact</a></li>
  <?php
      if(isset($_SESSION['username'])){
        echo "<li class='active'><a href='user.php'><i class='fa fa-cutlery' aria-hidden='true'></i> My recipes</a></li>";
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
  <li class="navlist"><a href="contact.php"><i class="fa fa-headphones" aria-hidden="true"></i> Contact</a></li>
  <li class="navlist" id='dropbtn'>
  <?php
      if(isset($_SESSION['username'])){
        echo "<a class='active'><i class='fa fa-user' aria-hidden='true'></i> welcome ".$_SESSION['username']." <i class='fa fa-angle-double-down' aria-hidden='true'></i></a>";
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

<div class="div1">
  <div class="text">
    <strong>RECIPE</strong>
  </div>
</div>



<div class="main">
 <form method="post" enctype="multipart/form-data">
 	<div class="field">
  <label for="recipe_title"><strong>Recipe Title:</strong></label><br>
  <input type="text" id="recipe_title" name="recipe_title" placeholder="Your Recipe Title" required>
</div>

<div class="field">
	<label for="description"><strong>Description:</strong></label><br>
	<textarea id="description" name="description" placeholder="Your Recipe Description" style="height:140px" required></textarea>
</div>

<div class="field">
  <label for="ingredient1"><strong>Recipe Ingredients:</strong></label><br>
  <textarea id="ingredient1" name="ingredient1" placeholder="Enter Your Recipe Ingredients" style="height:50px; width: 90%;" required></textarea>
  
  <div id="add_ingredients">
  </div>
  <input type="button" id="add_ingredient" class="btn" value="Add ingredients">
</div>

<div class="field">
  <label for="step_text1"><strong>Recipe Instructions:</strong></label><br>
  <textarea id="step_text1" name="step1" placeholder="Enter Your Recipe Instructions" style="height:100px; width: 90%;" required></textarea>

  <div id="add_steps">
    </div>
  <input type="button" id="add_step" class="btn" value="Add next step">
</div>

<div class="grid">
<div class="field">
	<label for="level"><strong>Recipe Difficulty:</strong></label><br>
<select id="level" name="level" required>
        <option value="" selected disabled style="display: none;"> Select level</option>
        <option value="Advance">Advance</option>
        <option value="Moderate">Moderate</option>
        <option value="Easy">Easy</option>
      </select>
</div>

<div class="field">
	<label for="category"><strong>Recipe Category:</strong></label><br>
<select id="category" name="category" required>
        <option value="" selected disabled style="display: none;"> Select Category</option>
        <option value="Beverages">Beverages</option>
        <option value="Healthy">Healthy</option>
        <option value="Main-Course">Main-Course</option>
        <option value="Dessert">Dessert</option>
  </select>
</div>

<div class="field">
	 <label for="serving"><strong>Servings:</strong></label><br>
  <select id="serving" name="serving" required>
        <option value="" selected style="display: none;"> Select Serving</option>
        <option value="1">1 serving</option>
        <option value="2">2 serving</option>
        <option value="3">3 serving</option>
        <option value="4">4 serving</option>
        <option value="5">5 serving</option>
        <option value="6">6 serving</option>
        <option value="7">7 serving</option>
        <option value="8">8 serving</option>
        <option value="9">9 serving</option>
        <option value="other_time">Other Number</option>
  </select><br>
  <input type="text" id="text_serving" name="text_serving" placeholder="Number of Servings" style="display: none;">
 </div>

<div class="field">
	 <label for="prep"><strong>Preparation Time:</strong></label><br>
  <select id="prep" name="prep" required>
        <option value="" selected style="display: none;"> Select Time</option>
        <option value="5 minutes">5 minutes</option>
        <option value="15 minutes">15 minutes</option>
        <option value="30 minutes">30 minutes</option>
        <option value="45 minutes">45 minutes</option>
        <option value="1 hour">1 hour</option>
        <option value="1:30 hours">1:30 hours</option>
        <option value="2 hours">2 hours</option>
        <option value="other_time">Other Preparation Time</option>
  </select><br>
  <input type="text" id="text_prep" name="text_prep" placeholder="Other Preparation Time" style="display: none;">
 </div>

<div class="field">
	 <label for="cook"><strong>Cooking Time:</strong></label><br>
  <select id="cook" name="cook" required>
        <option value="" selected style="display: none;"> Select Time</option>
        <option value="5 minutes">5 minutes</option>
        <option value="15 minutes">15 minutes</option>
        <option value="30 minutes">30 minutes</option>
        <option value="45 minutes">45 minutes</option>
        <option value="1 hour">1 hour</option>
        <option value="1:30 hours">1:30 hours</option>
        <option value="2 hours">2 hours</option>
        <option value="other_time">Other Cooking Time</option>
  </select><br>
  <input type="text" id="text_cook" name="text_cook" placeholder="Other Cooking Time" style="display: none;">
 </div>

<div class="field">
	 <label for="ready"><strong>Ready In(Total Time Required):</strong></label><br>
  <select id="ready" name="ready" required>
        <option value="" selected style="display: none;"> Select Time</option>
        <option value="5 minutes">5 minutes</option>
        <option value="15 minutes">15 minutes</option>
        <option value="30 minutes">30 minutes</option>
        <option value="45 minutes">45 minutes</option>
        <option value="1 hour">1 hour</option>
        <option value="1:30 hours">1:30 hours</option>
        <option value="2 hours">2 hours</option>
        <option value="other_time">Other Time</option>
  </select><br>
  <input type="text" id="text_ready" name="text_ready" placeholder="Other Time" style="display: none;">
 </div>
</div>

<div class="field">
	<label for="nutrition"><strong>Nutritional Facts:</strong></label><br>
	<textarea id="nutrition" name="nutrition" placeholder="Enter Nutrition Facts Of Your Recipe" style="height:140px" required></textarea>
</div>

<div class="field">
 <label for="img"><strong>Recipe image:</strong></label><br>
  <input type="file" id="img" name="img" accept="image/*" required >
  </div>


  <div class="field">
  	
  	<input type="submit" value="Submit" id="submit" name="submit">
  </div>

</form>
</div>



</form>


</div>
</body>
<script>

  ingrd_count = 1;
  step_count = 1;

  $('#add_ingredient').click(function(event){
    event.preventDefault();

    var ingrd= $('.count_ingrd');
    console.log(ingrd.length+1);
    if ( ingrd.length+1 >= 30 ) {
        alert("Maximum of 30 entries exceeded");
        return;
    }
    ingrd_count++;
    console.log("Adding position "+ingrd_count);
    $('#add_ingredients').append(
      '<div id="ingrd'+ingrd_count+'"  class="count_ingrd" style="position: relative;">\
      <textarea id="ingredient'+ingrd_count+'" name="ingredient'+ingrd_count+'" placeholder="Enter Your Recipe Ingredients" style="height:50px; width: 90%;" required></textarea>\
      <button class="delete" onclick="$(\'#ingrd'+ingrd_count+'\').remove();console.log(ingrd_count);return false;">X</button>\
      </div>');
        
  });

  $('#add_step').click(function(event){
    event.preventDefault();

    var steps= $('.count_steps');
    console.log(steps.length+1);
    if ( steps.length+1 >= 30 ) {
        alert("Maximum of 30 entries exceeded");
        return;
    }
    step_count++;
    console.log("Adding step "+step_count);
    $('#add_steps').append(
      '<div id="step'+step_count+'"  class="count_steps" style="position: relative;">\
      <textarea id="step_text'+step_count+'" name="step'+step_count+'" placeholder="Enter Your Recipe Instructions" style="height:100px; width: 90%;" required></textarea>\
      <button class="delete" onclick="$(\'#step'+step_count+'\').remove();return false;">X</button>\
      </div>');
        
  });




  var serve = document.querySelector('#serving');
  var prep = document.querySelector('#prep');
  var cook = document.querySelector('#cook');
  var ready = document.querySelector('#ready');

  $('#serving').change(function(){
    if(serve.value === 'other_time'){
      document.querySelector('#text_serving').style.display = 'block';
      document.querySelector('#text_serving').required = true;
      document.querySelector('#text_serving').focus();
    }
    else{
      document.querySelector('#text_serving').style.display = 'none';
      document.querySelector('#text_serving').required = false;
    }
  });

  $('#prep').change(function(){
    if(prep.value === 'other_time'){
      document.querySelector('#text_prep').style.display = 'block';
      document.querySelector('#text_prep').required = true;
      document.querySelector('#text_prep').focus();
    }
    else{
      document.querySelector('#text_prep').style.display = 'none';
      document.querySelector('#text_prep').required = false;
    }
  });

  $('#cook').change(function(){
    if(cook.value === 'other_time'){
      document.querySelector('#text_cook').style.display = 'block';
      document.querySelector('#text_cook').required = true;
      document.querySelector('#text_cook').focus();
    }
    else{
      document.querySelector('#text_cook').style.display = 'none';
      document.querySelector('#text_cook').required = false;
    }
  });

  $('#ready').change(function(){
    if(ready.value === 'other_time'){
      document.querySelector('#text_ready').style.display = 'block';
      document.querySelector('#text_ready').required = true;
      document.querySelector('#text_ready').focus();
    }
    else{
      document.querySelector('#text_ready').style.display = 'none';
      document.querySelector('#text_ready').required = false;
    }
  });

if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
}
</script>
</html>