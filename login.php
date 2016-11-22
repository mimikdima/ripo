<?php

include('conn.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<html lang = "en">
   
   <head>
      <title>TLogin</title>

      

      
   </head>
	
   <body>
      
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
        $login = $_POST["username"];
		$pass = $_POST["password"];
 $sql = "SELECT user_status,login,password FROM users WHERE login = '".$login."' && password = '".$pass."'";

$result = $conn->query($sql);

        if($result->num_rows > 0 )
        { 
		// session_start();
        //  $_SESSION["logged_in"] = true; 
		//	$_SESSION["naam"] = $login; 
			echo 'ok';
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
$conn->close();

				
               // if ($_POST['username'] == $login && 
                  // $_POST['password'] == $pass) {
                  // $_SESSION['valid'] = true;
                  // $_SESSION['timeout'] = time();
                  // $_SESSION['username'] = 'tutorialspoint';
                  
                  // echo 'You have entered valid use name and password';
               // }else {
                  // $msg = 'Wrong username or password';
               // }
            }
// session_start();
// unset($_SESSION["username"]);
// unset($_SESSION["password"]);

// echo 'You have cleaned session';
// header('Refresh: 2; URL = login.php');
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "login" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
      </div> 
      
   </body>
</html>