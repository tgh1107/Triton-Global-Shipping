<?php 

//index.php

include('database_connection.php');

?>
<!DOCTYPE html>

<html>


<head>
    <title>Pride-In-Perfume</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="JS/jquery-1.10.2.min.js"></script>
    <script src="JS/jquery-ui.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href = "CSS/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="CSS/myStyle.css" rel="stylesheet">
</head>

<body>

    <!-- header: logo and navigation-menu -->
    <?php include('header.php'); ?>
    <!-- end header -->
    
    <!-- start main body content -->
    <main>

    <div class="container">
        <div class="row">
        	<br />
        	
        	<br />
            <div class="col-md-3">                				
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="200" />
                    <p id="price_show">0 - 200</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(item_brand) FROM items WHERE item_status = '1'";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['item_brand']; ?>"  > <?php echo $row['item_brand']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h3>Gender</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(gender) FROM items WHERE item_status = '1'
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector gender" value="<?php echo $row['gender']; ?>" > <?php echo $row['gender']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
				
				
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>
    </div>

<!--<script type = "text/javascript" src = "JS/ourBrandsJS.js">-->
<!-- Item showing according to category-filter. 
    Cannot put this script in external JS since we're using documnet and (function) which can be used in the same page.
-->
        <script>
        $(document).ready(function(){

            filter_data();

            function filter_data()
            {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                var brand = get_filter('brand');
                var gender = get_filter('gender');
                
                $.ajax({
                    url:"fetch_data.php",
                    method:"POST",
                    data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, gender:gender},
                    success:function(data){
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });

            $('#price_range').slider({
                range:true,
                min:0,
                max:200,
                values:[0, 200],
                step:10,
                stop:function(event, ui)
                {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });

        });
        </script> 

    </main>
    <!-- end main -->

    <!-- footer start -->
    <?php include('footer.inc'); ?>
    <!-- end of footer -->

</body>

</html>