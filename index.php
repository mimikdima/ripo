<?php  session_start();?>

<html>  
      <head>  
           <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
		           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		   
 <style type="text/css">
	.web{
		font-family:tahoma;
		size:12px;
		top:10%;
		border:1px solid #CDCDCD;
		border-radius:10px;
		padding:10px;
		width:38%;
		margin:auto;
	}
	#information_search_id
	{
		width:300px;
		border:solid 1px #CDCDCD;
		padding:10px;
		font-size:14px;
	}
	#result
	{
		position:absolute;
		width:320px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CDCDCD solid;
		background-color: white;
	}
	.show
	{
		font-family:tahoma;
		padding:10px; 
		border-bottom:1px #CDCDCD dashed;
		font-size:15px; 
	}
	.show:hover
	{
		background:#364956;
		color:#FFF;
		cursor:pointer;
	}
</style>  
      </head>  
      <body>  
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
		   <?php if(isset($_SESSION["manager"])){?>
		   <a href = "logout.php" tite = "Logout">Logout</a>
		   <?}?>
      </body>  
 </html>  
 <script>  

 


 
 
 
 
 $(function(){
$(".search_keyword").keyup(function() 
{ 
    var search_keyword_value = $(this).val();
    var dataString = 'search_keyword='+ search_keyword_value;
    if(search_keyword_value!='')
    {
        $.ajax({
            type: "POST",
            url: "search.php",
            data: dataString,
            cache: false,
            success: function(html)
                {
                    $("#result").html(html).show();
                }
        });
    }
    return false;    
});
 
$("#result").on("click",function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find('.information_search').html();	
    var infosearch = $("<div/>").html($name).text();
	var data = 'infosearch='+ infosearch;
    $('#information_search_id').val(infosearch);
           $.ajax({  
                url:"search.php",  
                method:"POST",  
				dataType:"text",
				data: data,
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           }); 		
});
 

 
$(document).on("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search_keyword")){
        $("#result").fadeOut(); 
    }
});
 
$('#information_search_id').click(function(){
    $("#result").fadeIn();
});
});
 
 
 
 
 
 $(document).ready(function(){  
$('#reset_search').on("click", function(e) { 
	fetch_data();  
});
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
		   var quantity = $('#quantity').text();  
           if(price == '')  
           {  
                alert("Enter Price");  
                return false;  
           }  
           if(compatible_cars == '')  
           {  
                alert("Enter compatible cars");  
                return false;  
           }  
           if(information == '')  
           {  
                alert("Enter information");  
                return false;  
           } 
           if(quantity == '')  
           {  
                alert("Enter quantity");  
                return false;  
           } 
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{price:price, compatible_cars:compatible_cars,information:information, quantity:quantity},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
				$('#updated').text(data); 
                }  
           });  
		  
      }  
      $(document).on('blur', '.price', function(){  
           var id = $(this).data("id1");  
           var price = $(this).text();  
	  		if(isNaN(price)){
			  alert('Please enter a valid number');
		   }else{
				edit_data(id, price, "price");
		   }
      });  
      $(document).on('blur', '.compatible_cars', function(){  
           var id = $(this).data("id2");  
           var compatible_cars = $(this).text();  
           edit_data(id,compatible_cars, "compatible_cars");  
      });  
      $(document).on('blur', '.information', function(){  
           var id = $(this).data("id3");  
           var information = $(this).text();  
           edit_data(id,information, "information");  
      });
      $(document).on('blur', '.quantity', function(){  
           var id = $(this).data("id5");  
           var quantity = $(this).text();  
	  		if(isNaN(quantity)){
			  alert('Please enter a valid number');
		   }else{
				edit_data(id, quantity, "quantity");
		   }
      }); 
	  
$(document).on('click', '.btn_buy', function(){  
$('.web').fadeOut('fast');
	var buy_id = $(this).attr('id')
	var buy = 'buy_id='+ buy_id;

           $.ajax({  
                url:"select.php",  
                method:"POST",  
				dataType:"text",
				data: buy,
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });
			
});
 
 $(document).on('click', '#order', function(){  
           var part_id = $('.price').attr('id'); //id of order
           var name = $('.name').val();  
		   var address = $('#address').val();     
		   var phone = $('#phone').val(); 
           if(name == '')  
           {  
                alert("Enter Name");  
                return false;  
           }  
           if(address == '')  
           {  
                alert("Enter address");  
                return false;  
           }  
           if(phone == '')  
           {  
                alert("Enter phone");  
                return false;  
           } 
           $.ajax({  
                url:"buy.php",  
                method:"POST",  
                data:{name:name,address:address, phone:phone,part_id:part_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
					 $('.web').fadeIn('fast');
                }  
           })  		   
 });	  
	  
 });  
 </script>  