<html>  
      <head>  
           <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Matrix Test</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var price = $('#price').text();  
           var compatible_cars = $('#compatible_cars').text();  
		   var information = $('#information').text();  
           if(price == '')  
           {  
                alert("Enter First Name");  
                return false;  
           }  
           if(compatible_cars == '')  
           {  
                alert("Enter Last Name");  
                return false;  
           }  
           if(information == '')  
           {  
                alert("Enter Last Name");  
                return false;  
           } 
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{price:price, compatible_cars:compatible_cars,information:information},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
 
 });  
 </script>  