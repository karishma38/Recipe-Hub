<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Recipe Hub</title>
	<style>
		*{
  box-sizing: border-box;
  margin: 0;
  padding: 0;

}
body {
  font-family: "Raleway", sans-serif;
  height: 100%;
  width: 100%;
  background: url("img/food2.jpg");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
}

.title {
  font-size: 4em;
  margin-bottom: 1rem;
}
.subtitle {
  font-size: 3em;
  margin-bottom: 1rem;
}
.dark-overlay {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
}

.button1
{
  padding: 8px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  background-size: 100%;
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button1:hover {
  background-color: #f44336;
  color: white;
}

@media (max-width: 426px){
  .title{
    font-size: 2em;
  }
  .subtitle{
    font-size: 1.5em;
  }
}
	</style>

</head>
<body>
	
  <div class="dark-overlay">
    <div>
      <h1 class="title" style="color:white">RECIPE HUB</h1>
      <p class="subtitle" style="color:white">Discover Delicious Food</p>
      <div class="buttons text-center">
        <a href="signup1.php" class="button1">SignUp</a>
        <a href="login.php" class="button1">Login</a>
      </div>
      <a href="recipe_trial.php" style="color: white;">skip</a>
</div>
  </div>
	 



</body>
</html>