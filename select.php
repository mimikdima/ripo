<?php  
 session_start();
include('conn.php');

 if(isset($_POST['buy_id'])){
		 $output = '';  
		 $sql = "SELECT * FROM parts WHERE id ='".$_POST['buy_id']."'";  
		 $result = mysqli_query($conn, $sql);  
		 $output .= '  
			  <div class="table-responsive">  
				   <table class="table table-bordered">  
						<tr>  
							 <th width="5%">Price</th>  
							 <th width="20%">Compatible Cars</th>  
							 <th width="20%">information</th>  ';
						$output .= ' </tr>';  
		 if(mysqli_num_rows($result) > 0)  
		 {
			  while($row = mysqli_fetch_array($result))  
			  {
							$output .= '  
								<tr>  
									 <td class="price" data-id1="'.$row["id"].'" id="'.$row["id"].'" >'.$row["price"].'</td>  
									 <td class="compatible_cars" data-id2="'.$row["id"].'" >'.$row["compatible_cars"].'</td>  
									 <td class="information" data-id3="'.$row["id"].'" >'.$row["information"].'</td>
								</tr> 
							'; 
			  }  
		 } 
		 else  
		 {  
			  $output .= '<tr>  
								  <td colspan="4">Data not Found</td>  
							 </tr>';  
		 }  
		 $output .= '</table>  
		 
			<input type="text" name="name" class="name" id="name" placeholder="Enter Your Name" /><br/>
			<input type="text" name="address" id="address" placeholder="Enter Your Address" /><br/>
			<input type="number" name="phone" id="phone" placeholder="Enter Your phone" /><br/>
			<input type="submit" name="order" id="order" value="Order"  />
			  </div>';  

		 echo $output;  
}else{
			
		$output = '';  
		 $sql = "SELECT * FROM parts ORDER BY id ASC";  
		 $result = mysqli_query($conn, $sql);  
		 $output .= '  
			  <div class="table-responsive">  
				   <table class="table table-bordered">  
						<tr>  
							 <th width="5%">Id</th>  
							 <th width="5%">Price</th>  
							 <th width="20%">Compatible Cars</th>  
							 <th width="20%">information</th>  ';
							if(isset($_SESSION["manager"])){ 
							  $output .= ' 
							 <th width="5%">Quantity</th>
							 <th width="5%">Add</th>';
							}
						$output .= ' </tr>';  
		 if(mysqli_num_rows($result) > 0)  
		 {  
			  while($row = mysqli_fetch_array($result))  
			  {
					if(isset($_SESSION["manager"])){ 	
						   $output .= '  
								<tr>  
									 <td>'.$row["id"].'</td>  
									 <td class="price" data-id1="'.$row["id"].'" contenteditable>'.$row["price"].'</td>  
									 <td class="compatible_cars" data-id2="'.$row["id"].'" contenteditable>'.$row["compatible_cars"].'</td>  
									 <td class="information" data-id3="'.$row["id"].'" contenteditable>'.$row["information"].'</td>
									 <td class="quantity" data-id5="'.$row["id"].'" contenteditable>'.$row["quantity"].'</td>
									 <td></td> 
								</tr> 
							';  
					}else{
							$output .= '  
								<tr>  
									 <td>'.$row["id"].'</td>  
									 <td class="price" data-id1="'.$row["id"].'" >'.$row["price"].'</td>  
									 <td class="compatible_cars" data-id2="'.$row["id"].'" >'.$row["compatible_cars"].'</td>  
									 <td class="information" data-id3="'.$row["id"].'" >'.$row["information"].'</td>
									 <td width="5%"><button type="button" name="btn_buy" id="'.$row["id"].'" value="" class="btn btn-xs btn-success btn_buy">+ Buy</button></td>
								</tr> 
							'; 
					}
			  }  
		if(isset($_SESSION["manager"])){
			  $output .= '  
				   <tr>  
						<td></td>  
						<td id="price" required contenteditable></td>  
						<td id="compatible_cars" contenteditable></td>  
						<td id="information" contenteditable></td> 
						<td id="quantity" contenteditable></td>  					
						<td width="5%"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+ Add</button></td>
					</tr>  ';
		}
		 } 
		 else  
		 {  
			  $output .= '<tr>  
								  <td colspan="4">Data not Found</td>  
							 </tr>';  
		 }  
		 $output .= '</table>  
			  </div>';  
		 echo $output;  
		 
		 
}
 ?>  