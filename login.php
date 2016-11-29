<?php

include('conn.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (isset($_POST['login']) && !empty($_POST['username'])&& !empty($_POST['password'])) {
	
	$login = $_POST["username"];
	$pass = $_POST["password"];
	$sql = "SELECT user_status,login,password FROM users WHERE login = '".$login."' && password = '".$pass."'";
	$result = $conn->query($sql);

	if($result->num_rows > 0 )
	{ 
	session_start();
	 $_SESSION["manager"] = $login; 
	}
	else
	{
		echo 'The username or password are incorrect!';
	}
	$conn->close();

}

         ?>
<html lang = "en">
   
   <head>
      <title>Login</title>

      

      
   </head>
	
   <body>
      
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
      </div> <!-- /container -->
      
      <div class = "container">
      <?php if(!isset($_SESSION["manager"])){?>
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" name = "username" placeholder = "login" required autofocus></br>
            <input type = "password" class = "form-control"name = "password" placeholder = "password" required></br></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
         </form>
		<a href = "index.php" tite = "Main Page">Main Page</a></br></br></br>
		<?}else{?>
			<a href = "index.php" tite = "Main Page">Main Page</a></br></br></br>
		<?}?>
      </div> 
      
   </body>
</html>