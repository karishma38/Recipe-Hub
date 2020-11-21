<?php
session_start();
require_once "pdo.php";
if(isset($_SESSION['username'])){
  header( 'Location: recipe_trial.php' );
  return;
}

if ( isset($_POST['username']) && isset($_POST['password']) ) {
  $stmt = $pdo->prepare("SELECT * FROM users where username = :xyz");
  $stmt->execute(array(":xyz" => $_POST['username']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ( $row === false ) {
    $_SESSION['error'] = 'username does not exists please SignUp';
    header( 'Location: login.php' ) ;
    return;
  }
  else{
    $username = $row['username'];
    $password = $row['pass'];
    if($password == $_POST['password']){
      $_SESSION['username'] = $username;
      header( 'Location: recipe_trial.php' );
      return;
    }else{
      $_SESSION['error'] = 'Incorrect password';
      header( 'Location: login.php' ) ;
      return;
    }
    
  }
      
}

?>

<!DOCTYPE html>
<html>
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Recipe Hub</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
  box-sizing: border-box;
  margin: 0;
  padding: 0;

}

body {
  font-family: "Raleway", sans-serif;
  font-size: 1rem;
  line-height: 1.6;
  height: 100%;
  width: 100%;
  background: url("img/food2.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
color: white;
}
.dark-overlay {
  min-height: 100vh;
  min-width: 100vw;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);

}
.card {
  width: 400px;
  padding: 5px;
  border-radius: 30px;
  background-color: rgba(0, 0, 0, 0.8);
}

.card-body {
  padding: 40px;
  padding-top: 10px;
}
.card-title{
  text-align: center;
  padding: 10px;
  font-size: 2.4rem;
}
.form-group{
  margin-bottom: 10px;
}
.buttonsign
{
  background-color: white; 
  color: black; 
  border: 1px solid #f44336;
  padding: 6px 10px;
  margin-top: 10px;
  font-size: 15px;
  cursor: pointer;
}


.buttonsign:hover {
  background-color: #f44336;
  color: white;
}

.errmsg  {
  color: red;
}
.buttonsign2{
  background-color: red;
  color: white;
  padding: 3px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
}
</style>

	
</head>
<body>


  <div class="dark-overlay">
    <div class="card">
      <h5 class="card-title">LOGIN</h5>
      <form method="POST" onSubmit="return formValidation();">
        <div class="card-body">
          <?php
            if ( isset($_SESSION['success']) ) {
              echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
              unset($_SESSION['success']);
            }
            if ( isset($_SESSION['error']) ) {
              echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
              unset($_SESSION['error']);
          }
          ?>

          <label>Username</label>
          <div class="form-group ">
              <input type="text" id="username" placeholder="Enter username" autocomplete="off" name="username"/>
              <p class="errmsg" id="nameerr"></p>
          </div>
          <label>Password</label>
          <div class="form-group ">
              <input type="password" id="password" placeholder="Enter password" autocomplete="off" name="password"/>
              <span id="show" style="display: block;"><i class="fa fa-eye" aria-hidden="true"></i> show password</span>
              <p class="errmsg" id="passerr"></p>
          </div>

           <input type="submit" class="buttonsign" id="myBtn" value="Login" />
            <br>
            Don't have an account yet? <a href="signup1.php" class="buttonsign2">SignUp</a> here.
            <br>
            <a href="recipe_trial.php" style="color: white;">cancel</a>          
        </div>
      </form>
    </div>
  </div>

  <script>
function formValidation()
{
var uname = document.querySelector("#username");
var passid = document.querySelector("#password");
document.getElementById('nameerr').innerText='';
document.getElementById('passerr').innerText='';
allLetter(uname);
passid_validation(passid,8,15);

  if(allLetter(uname)){
    if(passid_validation(passid,8,15)){
      return true;
    }
  }

return false;
}

function allLetter(uname)
{ 
  var letters = /^[A-Za-z_0-9]+$/;
  if(uname.value.match(letters))
  {
    return true;
  }
  else
  {
    document.getElementById('nameerr').innerText="Username cannot be empty";
    uname.focus();
    return false;
  }
}


function passid_validation(passid,mx,my)
{
  if(passid.value === ''){
    document.getElementById('passerr').innerText="Password should not be empty";
    passid.focus();
    return false;
  }
  else{
    return true;
  }
}

    //show password

    document.querySelector('#show').addEventListener('click',function () {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
			document.querySelector('#show').innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i> show password';
		} else {
			x.type = "password";
			document.querySelector('#show').innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i> show password';
		}
	});
</script>
</body>
</html>