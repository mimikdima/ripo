  $(document).ready(function(){

////////////////////////////////// Add/////////////////////////////////////////////	  
      $(document).on('click', '#btn_add', function(){  
           var price = $('#price').text();  
           var compatible_cars = $('#compatible_cars').text();  
		   var information = $('#information').text();  
		   var quantity = $('#quantity').text();  
           if(price == '')  
           {  
                //alert("Enter Price");  
				$('#price').after('<p>Phone number has to be 10 digits long.</p>')
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
///////////////////////////////////////////////////////////////////////////////////	  
	  
/////////////////////////////////////// Edit////////////////////////////////////////////	  
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
///////////////////////////////////////////////////////////////////////////////////

}); 