<?php

//fetch_data items

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM items WHERE item_status = '1'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND item_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND item_brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["gender"]))
	{
		$gender_filter = implode("','", $_POST["gender"]);
		$query .= "
		 AND gender IN('".$gender_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			
			$output .= '
			<link href="CSS/myStyle.css" rel="stylesheet" type="text/css">
			<div class="col-sm-4 col-lg-3 col-md-3">
			<form action="shoppingCart.php" method="post">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
				
					<img src="image/'. $row['item_picture'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="detail.php?item_id='. $row['item_id'] .'">'. $row['item_name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['item_price'] .'</h4>
					
					 
					<input type="text" name="quantity" value="1" height="10px">
					<input type="hidden" name="item_name" value="'. $row['item_name'] .'"> 
					<input type="hidden" name="item_price" value=" '. $row['item_price'] .'">
					<br><br>
					<input type="submit" name="add" value="Add to Cart" align="center" id="add_to_cart_button"><br><br>
					
					

		
				</form>
					
					

				</div>

			</div>
			';
		}				
	}
	else
	{
		$output = '<h3>No Item Found</h3>';
	}
	echo $output;
}

?>