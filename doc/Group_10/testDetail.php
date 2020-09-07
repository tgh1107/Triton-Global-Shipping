<!DOCTYPE html>

<html>

<head>
    <title>Pride-In-Perfume</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="CSS/myStyle.css" rel="stylesheet" type="text/css">
    <script src="../JS/myJS.js"></script>
</head>

<body>
    
    <!-- start main body content -->
    <main>

<?php
    include("db_connect.php");
    $con = db_connect();

    if ( isset($_GET['item_id']) ){
            
        //$qty = $_GET['quantity'];
        $id = $_GET['item_id'];
        //$price = $_POST['item_price'];

        //echo $qty ."<br>"; 
        //echo $id ."<br>";

    
            $query = $con -> prepare("SELECT * FROM items WHERE item_id = ?");
            $query -> bind_param("i", $id);

            $result = $query -> execute();
            $result = $query -> get_result();

            if($result -> num_rows > 0) {

                while ($row = $result -> fetch_assoc()) {

?>

                    <form >
                        <section id="ourStory">
                                <div class="ourstory-container">
                                    <div class="Column1">
                                        <img src="<?php echo 'image/'. $row['item_picture'] ?>" class="img-responsive">
                                                   
                                    </div>
                                    <div class="Column2">   
                                        <h5 class="text-info"> Name : <?php echo $row["item_name"]; ?>  </h5>
                                        <h5 class="text-danger"> Price : $ <?php echo $row["item_price"]; ?> </h5>
                                        <h5 > Perfume Brand : <?php echo $row["item_brand"]; ?> </h5>
                                        <h5 > Perfume Gender : <?php echo $row["gender"]; ?> </h5>
                                        <h5 > Perfume Quantity : <?php echo $row["item_size"]; ?> </h5>
                                        <h5 > Launch Year : <?php echo $row["item_launch_year"]; ?> </h5>
                                        <h5 > Description : <?php echo $row["item_description"]; ?> </h5>
                                    </div> 
                                
                                </div>
                             
                        </section>
                    </form>
                    
                    
                    <?php
                }
            }


        //echo $price;
    }
?>

    </main>
    <!-- end main -->





</body>

</html>