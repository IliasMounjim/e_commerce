<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
*

 11/20/2022 

*/

include('../view/header.php');
?>


<main>

    <!-- Display books with $select_books array -->
    <div id="border">
    <div id="books" class="row">
        <?php for($x = 0; $x < sizeof($select_books); $x++) {?>
            <figure>
                
                <!-- Display image with the image location -->
                <img src="<?php echo $select_books[$x]['pictureName'] ;?>">

                <!-- Dsiplay book name -->
	            <figcaption><?php echo $select_books[$x]['bookName'] ;?></figcaption>

                <!-- Display price, if discount > 0 then display the price after discount -->
                <span class="price">
                    <?php if($select_books[$x]['discountPercent'] > 0.00) {

                        //  Using s tag to cross out original price, and using number_format() to get it to display 2 decimal places
                        echo "<s>$".$select_books[$x]['listPrice']."</s>&ensp;Now:&nbsp;$".number_format(($select_books[$x]['listPrice'] *(1.00 - $select_books[$x]['discountPercent'])), 2, '.', '');
                    }
                    else{
                        echo "$".$select_books[$x]['listPrice'];
                    }?>
                </span>

                <!-- The buy button -->
                <a class="button" href="../controller/index.php?user_Action=book&bookId=<?php echo $select_books[$x]['bookID'];?>">Buy</a>
                    
	        </figure>
        
        <!-- end for loop -->
        <?php }?>
    
    <!-- end book div -->
    </div><br><br><br>
 
</main> 

<?php include('../view/footer.php'); ?>
