<?php

/*
 * Description: 
 * Author - Eli Mounjim
 * Version - 20221022
 */


include('../view/header.php');

?>

<main>


    <!-- Display books with $all_ordered_books array -->
    <div id="border">
    <div id="books" class="row">
        <?php for($x = 0; $x < sizeof($all_ordered_books); $x++) {?>
            <figure>
                
                <!-- Display image with the image location -->
                <img src="<?php echo $all_ordered_books[$x]['pictureName'] ;?>">

                <!-- Dsiplay book name -->
	            <figcaption><?php echo $all_ordered_books[$x]['bookName'] ;?></figcaption>

                <!-- Display price, if discount > 0 then display the price after discount -->
                <span class="price">
                    <?php echo "Total (include 2% tax):&ensp;$ ".$order_info[$x]['totalAmount'] ?><br><br>
                    <?php echo "Arrive at:&ensp;".$order_info[$x]['shipDate'] ?><br><br>
                    <?php echo "Ship to: ".$user_address['line1']." ".$user_address['line2']."&ensp;".$user_address['city'].",&ensp;".$user_address['address_State']."&ensp;".$user_address['zipCode'];?>
                </span>

                    
	        </figure>
        
        <!-- end for loop -->
        <?php }?>
    
    <!-- end book div -->
    </div><br><br><br>
 
</main> 
  
<?php include('../view/footer.php'); ?>
