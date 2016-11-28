  $(document).ready(function(){
 
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
	  
	  
	  
 


	 ////////////////////////////////// Order/////////////////////////////////////////////////   
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
	///////////////////////////////////////////////////////////////////////////////////  
 });  