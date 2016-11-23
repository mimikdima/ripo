<?php
   session_start();
   unset($_SESSION["manager"]);
   
   header('Location: login.php');
   echo 'You have cleaned session';
?>