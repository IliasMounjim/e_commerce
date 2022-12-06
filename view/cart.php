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
            <?php
            $grandTotal = 0;
            for ($x = 0; $x < sizeof($all_ordered_books); $x++) { ?>
                <figure>
                    
                    
                    
                    <img src="<?php echo $all_ordered_books[$x]['pictureName']; ?>">
                    
                    <!-- Dsiplay book name -->
                    <figcaption><?php echo $all_ordered_books[$x]['bookName']; ?></figcaption>
                    <!-- Display price, if discount > 0 then display the price after discount -->
                    <span class="price">
                        <?php $grandTotal += $order_info[$x]['totalAmount']; ?>
                        <?php echo "Price (include 2% tax):&ensp;$ " . $order_info[$x]['totalAmount'] ?><br>
                        <?php echo "Arrive at:&ensp;" . $order_info[$x]['shipDate'] ?><br>
                        <?php echo "Ship to: " . $user_address['line1'] . " " . $user_address['line2'] . "&ensp;" . $user_address['city'] . ",&ensp;" . $user_address['address_State'] . "&ensp;" . $user_address['zipCode']; ?>
                        
                        <!-- The delete button -->
                        
                    </span>
                    <div class= "deleteOrder">

                        
                         <!-- The delete button -->
                        <form action="../controller/index.php" method="post">

                            <input type="hidden" name="user_Action" value="delete_order">
                            <input type="hidden" name="bookID" value="<?php echo $all_ordered_books[$x]['bookID'];?>">
                            <input type="hidden" name="bookName" value="<?php echo $all_ordered_books[$x]['bookName'];?>">
                            <input class="delete_a_order" type="submit" name="delete" value="Remove">
                        </form>
                    </div>


                </figure>

                <!-- end for loop -->
            <?php } ?>

            <!-- end book div -->
        </div><br><br><br>
        <div class="totalAmount" style="font-size:x-large;">
            <p><?php echo "Total amount is : $grandTotal" . "&ensp;"; ?></p>
            <div class= "middle">
                <button  type="submit">Checkout Book</button> 
            </div>
            
        </div>


</main>

<?php include('../view/footer.php'); ?>