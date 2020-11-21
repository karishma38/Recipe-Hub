<?php
  session_start();
  require_once "pdo.php";
  if(isset($_SESSION['username'])){
    header( 'Location: recipe_trial.php' );
    return;
  }

  if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $stmt = $pdo->prepare("SELECT * FROM users where username = :xyz");
    $stmt->execute(array(":xyz" => $_POST['username']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row === false ) {
      $sql = "INSERT INTO users (username, email, pass) VALUES (:username, :email, :pass)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
      ':username' => $_POST['username'],
      ':email' => $_POST['email'],
      ':pass' => $_POST['password']));
      $_SESSION['success'] = 'Account created';
      header( 'Location: login.php' ) ;
      return;
    }
    else{
      $_SESSION['error'] = 'username already exists';
      header( 'Location: signup1.php' ) ;
      return;
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

  <div class=" dark-overlay">
    <div class="card">
      <h5 class="card-title">SIGNUP</h5>
      <form method="POST" onSubmit="return formValidation();">
          <div class="card-body">
              <label for="username">Username</label>
              <div class="form-group ">
                <input type="text" name="username" id="username" placeholder="Enter username" autocomplete="off">
                <p class="errmsg" id="nameerr"></p>
                <?php
                  if ( isset($_SESSION['error']) ) {
                      echo '<p class="errmsg">'.$_SESSION['error']."</p>\n";
                      unset($_SESSION['error']);
                  }
                ?>
              </div>
              <label for="email">Email</label>
              <div class="form-group ">
                <input type="text" name="email" id="email" placeholder="Enter email" autocomplete="off">
                <p class="errmsg" id="emailerr"></p>
              </div>
              <label for="password">Password</label>
              <div class="form-group ">
                <input type="password" id="password" name="password" placeholder="Enter password" autocomplete="off" title="8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit"/>
                <span id="show" style="display: block;"><i class="fa fa-eye" aria-hidden="true"></i> show password</span>
                <p class="errmsg" id="passerr"></p>
              </div>
            

              
                  <input type="submit" class="buttonsign " name="signup"  value="SignUp"/>               
                  <br>
                  Already have an account? <a href="login.php" class="buttonsign2">Login</a> here.
                  <br>
                  <a href="recipe_trial.php" style="color: white;">cancel</a>              
      </form>
    </div>
  </div>



<script>
function formValidation()
{
var uname = document.querySelector("#username");
var passid = document.querySelector("#password");
var uemail = document.querySelector("#email");
document.getElementById('nameerr').innerText='';
document.getElementById('emailerr').innerText='';
document.getElementById('passerr').innerText='';
allLetter(uname);
ValidateEmail(uemail);
passid_validation(passid,8,15);

  if(allLetter(uname)){
    if(ValidateEmail(uemail)){
      if(passid_validation(passid,8,15)){
        return true;
      }
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



function ValidateEmail(uemail)
{
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(uemail.value.match(mailformat))
  {
    return true;
  }
  else if(uemail.value === ''){
    document.getElementById('emailerr').innerText="email address cannot be empty";
    uemail.focus();
    return false;
  }
  else
  {
    document.getElementById('emailerr').innerText="You have entered an invalid email address!";
    uemail.focus();
    return false;
  }
}



function passid_validation(passid,mx,my)
{
  var passid_len = passid.value.length;
  var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/;
  if(passid.value === ''){
    document.getElementById('passerr').innerText="Password should not be empty";
    passid.focus();
    return false;
  }
  else if (passid_len == 0 || passid_len >= my || passid_len < mx)
  {
    document.getElementById('passerr').innerText="Password length be between "+mx+" to "+my;
    passid.focus();
    return false;
  }
  else if(passid.value.match(passw)) 
  { 
    return true;
  }
  else{
    document.getElementById('passerr').innerText="Must contain at least one lowercase letter, one uppercase letter, one numeric digit";
    passid.focus();
    return false;
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