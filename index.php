<?php  session_start();?>

<html>  
      <head>  
           <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		   <link rel="stylesheet" href="style.css" />
		           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
		   
<?php if(isset($_SESSION["manager"])){?>
		   <script src="js_manager.js"></script> 
<?}else{?>
			<script src="js.js"></script> 		   
<?}?>
</style>  
      </head>  
      <body>  
<?php if(isset($_SESSION["manager"])){?>
	<a href = "logout.php" title = "Logout">Logout</a>
<?}else{?>
	<a href = "login.php" title = "LogIn">LogIn</a>
<?}?>
           <div class="container">  
                <br />  
                <br />  
                <br />  

                <div class="table-responsive">  
                     <h3 align="center">Matrix Test</h3><br />  
	<div class='web'>
        <input type="text" class="search_keyword" id="information_search_id" placeholder="Search Part" />
        <div id="result"></div> <input type="button" class="reset_search" id="reset_search" value="Clean Search" />
    </div>
                     <div id="live_data"></div>                 
                </div>  
				<div id="updated" style="color:green;"></div>  
           </div>  

      </body>  
 </html>  
