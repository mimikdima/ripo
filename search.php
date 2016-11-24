<?php
 include('conn.php');
    if(isset($_POST['search_keyword']))
    {
        $search_keyword = $conn->real_escape_string($_POST['search_keyword']);
        $sqlinfo="SELECT price,compatible_cars,information FROM parts WHERE information LIKE '%$search_keyword%'";
        $resInfo=$conn->query($sqlinfo);
 
        if($resInfo === false) {
            trigger_error('Error: ' . $conn->error, E_USER_ERROR);
        }else{
            $rows_returned = $resInfo->num_rows;
        }
 
	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
	if($rows_returned > 0){
            while($rowin = $resInfo->fetch_assoc()) 
            {		
                echo '<div class="show" align="left"><span class="information_search" id="information_search" name="information_search">'.str_ireplace($search_keyword,$bold_search_keyword,$rowin['information']).'</span></div>'; 	
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 	
        }
    }
	
	
if(isset($_POST['infosearch'])){
$information_search = $_POST['infosearch'];
 $output = '';  
 $sql = "SELECT * FROM parts WHERE information = '".$information_search."'";  
 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Id</th>  
                     <th width="5%">Price</th>  
                     <th width="20%">Compatible Cars</th>  
                     <th width="20%">information</th>
				</tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {
					$output .= '  
						<tr>  
							 <td>'.$row["id"].'</td>  
							 <td class="price" data-id1="'.$row["id"].'" >'.$row["price"].'</td>  
							 <td class="compatible_cars" data-id2="'.$row["id"].'" >'.$row["compatible_cars"].'</td>  
							 <td class="information" data-id3="'.$row["id"].'" >'.$row["information"].'</td>
							 <td width="5%"><button type="button" name="btn_buy" id="btn_buy" class="btn btn-xs btn-success">+ Buy</button></td>
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
      </div>';  
 echo $output;  
}

?>