<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
* Version - 20221022
*/

include('../view/admin_header.php');
?>


<main>


<!-- Display books with $all_result array -->
<div id="border">
<div id="books" class="row">
    <?php for($x = 0; $x < sizeof($all_result); $x++) {?>
        <figure>
            
            <!-- Display image with the image location -->
            <img src="<?php echo $all_result[$x]['pictureName'] ;?>">

            <!-- Dsiplay book name -->
            <figcaption><?php echo $all_result[$x]['bookName'] ;?></figcaption>

            <!-- Display price, if discount > 0 then display the price after discount -->
            <span class="price">
                <?php if($all_result[$x]['discountPercent'] > 0.00) {

                    //  Using s tag to cross out original price, and using number_format() to get it to display 2 decimal places
                    echo "<s>$".$all_result[$x]['listPrice']."</s>&ensp;Now:&nbsp;$".number_format(($all_result[$x]['listPrice'] *(1.00 - $all_result[$x]['discountPercent'])), 2, '.', '');
                }
                else{
                    echo "$".$all_result[$x]['listPrice'];
                }?>
            </span>
                


        <!-- update button -->
                <div class="buttons">
                <form action="../controller/index.php" method="post">

                    <input type="hidden" name="user_Action" value="update_books_form">
                    <input type="hidden" name="bookID" value="<?php echo $all_result[$x]['bookID']; ?>">
                    <input class="update_a_book" type="submit" name="update" value="Update">
                </form>

                <!-- The delete button -->
                <form action="../controller/index.php" method="post">

                    <input type="hidden" name="user_Action" value="delete_books">
                    <input type="hidden" name="bookID" value="<?php echo $all_result[$x]['bookID']; ?>">
                    <input class="delete_a_book" type="submit" name="delete" value="Delete">
                </form>
                </div>
                
                <!-- click to check details of the book -->
                <form action="../controller/index.php" method="post">
                    <input type="hidden" name="user_Action" value="admin_books">
                    <input type="hidden" name="bookID" value="<?php echo $all_result[$x]['bookID']; ?>">
                    <input class="admin_book" type="submit" name="details" value="Details">
                </form>
	    </figure>
    
    <!-- end for loop -->
    <?php }?>

<!-- end book div -->
</div><br><br><br>

</main> 

<?php include('../view/admin_footer.php'); ?>
