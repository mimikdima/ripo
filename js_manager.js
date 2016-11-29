  $(document).ready(function(){

  
//////////////////////////////////Select //////////////////////////////////////////

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
 /////////////////////////////////////////////////////////////////////////////////// 	  
	  
  
  
  
////////////////////////////////// Add/////////////////////////////////////////////	  
      $(document).on('click', '#btn_add', function(){  
           var price = $('#price').text();  
           var compatible_cars = $('#compatible_cars').text();  
		   var information = $('#information').text();  
		   var quantity = $('#quantity').text();  
           if(price == '')  
           {  
				$('#price').focus();
                alert("Enter Price");  
                return false;  
           }  
		   if(isNaN(price)){
			   alert('Please enter a valid number');
			   $('#price').html('');
			   $('#price').focus();
			   $('#price').css('border','2px solid red');
			   return false;  
		   }else{$('#price').css('border','none');}
           if(compatible_cars == '')  
           {  
				$('#compatible_cars').focus();
                alert("Enter compatible cars");  
                return false;  
           }  
           if(information == '')  
           {  
	   				$('#information').focus();
                alert("Enter information");  
                return false;  
           } 
           if(quantity == '')  
           {  
	   				$('#quantity').focus();
                alert("Enter quantity");  
                return false;  
           } 
		   if(isNaN(quantity)){
			    alert('Please enter a valid number');
				$('#quantity').html('');
				$('#price').focus();
			    $('#quantity').css('border','2px solid red');
				return false;  
		   }else{$('#price').css('border','none');}
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
				$(this).html(''); 
				$(this).focus(); 
			    alert('Please enter a valid number'); 
			    return false;  
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
				$(this).html(''); 
				$(this).focus(); 
			    alert('Please enter a valid number');
			    return false;  
		   }else{
				edit_data(id, quantity, "quantity");
		   }
      }); 
///////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////Search //////////////////////////////////
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


$('#reset_search').on("click", function(e) { 
	fetch_data();  
});
///////////////////////////////////////////////////////////////////////////////////
}); 