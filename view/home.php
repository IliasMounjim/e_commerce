<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
* Version - 20221022
*/

include('../view/header.php');
?>


<main>
    <div class="welcome-wrapper" style="text-align:center">
        <h1>E-commerce website coming soon </h1>
    </div>



    <!-- Display books with $all_books array -->
    <div id="border">
    <div id="books" class="row">
        <?php for($x = 0; $x < sizeof($all_books); $x++) {?>
            <figure>
                
                <!-- Display image with the image location -->
                <img src="<?php echo $all_books[$x]['pictureName'] ;?>">

                <!-- Dsiplay book name -->
	            <figcaption><?php echo $all_books[$x]['bookName'] ;?></figcaption>

                <!-- Display price, if discount > 0 then display the price after discount -->
                <span class="price">
                    <?php if($all_books[$x]['discountPercent'] > 0.00) {

                        //  Using s tag to cross out original price, and using number_format() to get it to display 2 decimal places
                        echo "<s>$".$all_books[$x]['listPrice']."</s>&ensp;Now:&nbsp;$".number_format(($all_books[$x]['listPrice'] *(1.00 - $all_books[$x]['discountPercent'])), 2, '.', '');
                    }
                    else{
                        echo "$".$all_books[$x]['listPrice'];
                    }?>
                </span>

                <!-- The buy button -->
                <a class="button" href="../controller/index.php?user_Action=book&bookId=<?php echo $all_books[$x]['bookID'];?>">Buy</a>
                    
	        </figure>
        
        <!-- end for loop -->
        <?php }?>
    
    <!-- end book div -->
    </div><br><br><br>

</main> 

<?php include('../view/footer.php'); ?>

