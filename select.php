<?php  
include('conn.php');
 $output = '';  
 $sql = "SELECT * FROM parts ORDER BY id ASC";  
 $result = mysqli_query($conn, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="30%">price</th>  
                     <th width="30%">Compatible Cars</th>  
                     <th width="10%">information</th>  
					  <th width="10%">Add</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="price" data-id1="'.$row["id"].'" contenteditable>'.$row["price"].'</td>  
                     <td class="compatible_cars" data-id2="'.$row["id"].'" contenteditable>'.$row["compatible_cars"].'</td>  
					 <td class="information" data-id3="'.$row["id"].'" contenteditable>'.$row["information"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="price" contenteditable></td>  
                <td id="compatible_cars" contenteditable></td>  
				<td id="information" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
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
 ?>  