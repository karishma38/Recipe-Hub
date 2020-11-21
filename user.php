<?php
  session_start();
  require_once "pdo.php";

    if(!isset($_SESSION['username'])){
        header( 'Location: landing.php' ) ;
        return;
    }

  $stmt = $pdo->prepare("SELECT * FROM users where username = :xyz");
  $stmt->execute(array(":xyz" => $_SESSION['username']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $pass = $row['pass'];
  $email = $row['email'];

  if(isset($_POST['edit'])){
    $sql = "UPDATE `users` SET `email`=(:email),`pass`=(:pass) WHERE `username`=(:username)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':username' => $_POST['username'],
        ':email' => $_POST['emailid'],
        ':pass' => $_POST['pass']));
      $_SESSION['success'] = 'values updated';
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
<style>
.user{
    width: 80%;
    margin: 50px auto;
}
#emailid, #pass, #emailid:focus, #pass:focus{
    border: none;
    outline: none;
    padding-left: 10px;
    padding-right: 30px;
    line-height: 25px;
    width: 100%;
}
.data{
  position: relative;
    border: 1px solid black;
    width: 250px;
}
.edit{
  margin: 0 5px;
  position: absolute;
  right: 0;
  line-height: 25px;
}

#edit, #cancel{
  padding: 5px;
  margin-top: 10px;
}

.button {
  background-color: grey;
  border: solid black 1px;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button:hover{
    background-color:black;
    color:white;
}
.operation{
  height: 30px;
  width: 30px;
  position: absolute;
  border: none;
  border-radius: 50%;
  z-index: 2;
  font-size: 1.2em;
  outline: none;
}
.del{
  background-color: #d9534f;
  right: 0;
  top: 0;
}
.del:hover{
  background-color: #c9302c;
  transform: scale3d(1.1,1.1,1);
  -webkit-transform: scale3d(1.1,1.1,1);
}
.update{
  background-color: #59a9ff;
  right: 40px;
  top: 0;
}
.update:hover{
  background-color: #007bff;
  transform: scale3d(1.1,1.1,1);
  -webkit-transform: scale3d(1.1,1.1,1);
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
<div class="user">
    <h1>welcome <?=$_SESSION['username']?></h1>
    <div id="userinfo">
    <?php
            if ( isset($_SESSION['success']) ) {
              echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
              unset($_SESSION['success']);
            }
    ?>
        <form method="post">
            <input type="hidden" name="username" value=<?= "'".$_SESSION['username']."'"?>>
            <br>
            <label for="emailid">Email:</label>
            <div class="data">
            <input type="email" name="emailid" id="emailid" value=<?= "'".$email."'"?> disabled required><span class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></span>
            </div>
            <br>
            <label for="pass">Password:</label>
            <div class="data">
            <input type="password" name="pass" id="pass" value=<?= "'".$pass."'"?> disabled required><span class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></span>
            </div>
            <span id="show" style="display: none;"><i class="fa fa-eye" aria-hidden="true"></i> show password</span>
            <input type="submit" name="edit" id="edit" value="Edit" style="display: none;">
            <input type="button" id="cancel" value="cancel" style="display: none;">
        </form>
    </div>
<br>
    <a href="addrecipe.php"><button class="button">Add Recipe</button></a>
</div>
<div class="recipes">
    <center><h2>Your recipes</h2></center>
    <div class="list">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM `dishes` WHERE `uploded_by`=:xyz");
        $stmt->execute(array(":xyz" => $_SESSION['username']));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ( count($rows) == 0) {
          echo ("<p style='margin:10px;'>you didn't added any recipes yet</p>");
        }
        else{
          foreach( $rows as $row )
          {
            ?>
            <div class="recipe_card">
                <a href="edit.php?id=<?=$row['id']?>"><button class="operation update" ><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                <a href="delete.php?id=<?=$row['id']?>" Onclick="return confirm('Are you sure you want to delete <?=$row['name']?> recipe?');"><button class="operation del" ><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                <div class="dish_img">
                    <a href="recipe.php?id=<?=$row['id']?>">
                        <img class="dishimg" src="<?=$row['image']?>" >
                    </a>
                </div>
                <div class="dish_info">
                    <div class="dishname" style="margin: 10px 0;">
                    <h4 ><a href="recipe.php?id=<?=$row['id']?>" class="dish_name"><?=$row['name']?></a></h4>
                    <a class="chefname" href="#"><img src="img/chefhat.png" alt="" width="20" height="20"> By <?=$row['uploded_by']?></a>
                    </div>
                    <div class="dish_metadata">
                        <div class="meta" style="background-color: #ffc42b;display: inline-block;padding: 5px 10px;border-radius: 20px;"><?=$row['ready_in']?></div>
                        <div class="meta" style="background-color: #ffc42b;display: inline-block;padding: 5px 10px;border-radius: 20px;"><?=$row['serve']?> serve</div>
                    </div>
                </div>
            </div>
                            
            <?php
          }
        }
    
    ?>
    
    
</div>
</div>
</body>
<script>
    var email = document.getElementById('emailid').value;
    var pass = document.getElementById('pass').value;
    var editbtns= document.querySelectorAll('.edit');
    editbtns.forEach(btn =>{
        btn.addEventListener('click', function(){
            document.getElementById('emailid').disabled = false;
            document.getElementById('pass').disabled = false;
            document.getElementById('show').style.display = "block";
            document.getElementById('edit').style.display = "inline-block";
            document.getElementById('cancel').style.display = "inline-block";
        });
       
    });
    document.getElementById('cancel').addEventListener('click', function(){
        document.getElementById('emailid').disabled = true;
        document.getElementById('emailid').value = email;
        document.getElementById('pass').disabled = true;
        document.getElementById('pass').value = pass;
        document.getElementById('show').style.display = "none";
        document.getElementById('edit').style.display = "none";
        document.getElementById('cancel').style.display = "none";
    })

    //show password

	document.querySelector('#show').addEventListener('click',function () {
		var x = document.getElementById("pass");
		if (x.type === "password") {
			x.type = "text";
			document.querySelector('#show').innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i> show password';
		} else {
			x.type = "password";
			document.querySelector('#show').innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i> show password';
		}
	});

</script>
</html>