<?php

//Adding items which user clicked to the 'temp_items' table

    require 'db_connect.php';
    $conn = db_connect();

    if ( isset($_POST['add']) ){
            
        $qty = $_POST['quantity'];
        $name = $_POST['item_name'];
        $price = $_POST['item_price'];

        /*just update the quantity if the item is already added*/
		$query = $conn->prepare("SELECT * FROM temp_items WHERE name = ?");
	    $query->bind_param("s",$name);
	    $query->execute();
        $result = $query->get_result();
        
	    if($result->num_rows > 0){
            $query = $conn -> prepare("UPDATE temp_items SET quantity=quantity+? WHERE name=?"); //updating quantity
            $query -> bind_param("is", $qty, $name);
            $result = $query -> execute();
           /* if($result){
                echo "<script type='text/javascript'>alert('The same item is added again to your shopping cart.');
                window.history.back();</script>";
           } */
        }

        else{
            $prepare = $conn -> prepare("insert into temp_items(name, price, quantity) 
            values (?, ?, ?)");
            
            $prepare->bind_param("sdi", $name, $price, $qty);
            $result2 = $prepare->execute();
            /*if($result2){
                echo "<script type='text/javascript'>alert('The item is added to your shopping cart.');
                window.history.back();</script>";
            }*/
        }

    }

//retrieving data to the table
    $total = 0.0;
    $all_total = 0.0;

    $query = $conn->prepare("SELECT * FROM temp_items");
    $query->execute();        
    $result = $query->get_result();

    if($result -> num_rows > 0)
    {

    	echo ' <link href="CSS/myStyle.css" rel="stylesheet" type="text/css"> ';

	    echo "<br><br>";
    	echo "<center>";
        echo "<table id='cart_table' border='1'>";
        echo "<tr><th>Name</th><th>Quantity</th><th>Price</th><th>Remove Item</th></tr>";
        //to access each row 
        while($row = $result -> fetch_assoc()){
            
            $name = $row['name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $total = $price * $quantity;
            $all_total += $total;
            
            echo "<tr><td align='right'>$name</td>
                    <td align='right'>$quantity</td>
                    <td align='right'>$total</td>
                    <td align='right'><a href='delete_cart_item.php?name=$name'>Remove</a></td>
                </tr>";
        
        }
        echo "<tr>
        			<td><br></td>
        			<td><br></td>
        			<td><br></td>
        			<td><br></td>
        	  </tr>";


        echo "<tr>
        		<td></td>
        		<th align='right'>Total</th>
        		<td align='right'>$all_total</td>
        		<td></td>
        	  </tr>";

        echo "<tr>
        		<td></td>
        		<td><a href='buy.php'>Buy</a></td>
                <td><a href='delete_tempItems.php'>Cancel Cart</a></td>
                <td></td>
            </tr>";
        echo "</table>";
        echo "</center>";
    }
    //close the connection after output data
    mysqli_close($conn);
?>
    