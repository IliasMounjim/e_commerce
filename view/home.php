<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
* Version - 20221022
*/

include('../view/header.php');
?>


<main>
    
    <!-- display added a book to order msg box  -->
    <?php if(isset($added_message)){?>
        <div class="added">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $added_message ;?>
        </div>
    <?php } ?>

    <!-- display added a new employee message box  -->
    <?php if(isset($error_msg)){?>
        <div class="errorMsg">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $error_msg ;?>
        </div>
    <?php } ?>


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
                <div class="buyContainer">
                   <button type="button" class="btn btn-secondary btn-sm buyModal" value="<?php echo $all_books[$x]['bookID'];?>" data-bs-toggle="modal" data-bs-target="#updateModal">Buy</button>
               </div>
               
                    
	        </figure>
        
        <!-- end for loop -->
        <?php }?>
    
    <!-- end book div -->
    </div><br><br><br>
    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    
    <!-- To  show the employee's information in the pop up -->
    <script>
        $("button").click(function() {
            var fired_buttonID = $(this).val();
            alert(fired_buttonID);
        });
    $(document).ready(function ( ) {
        $('.buyModal').on('click', function() {

            $('#buyModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#bookName').val(data[0]);
            // $('#empLName1').val(data[1]);
            // $('#empFName1').val(data[2]);
            // $('#empInitial1').val(data[3]);
            // $('#hireDate1').val(data[4]);
            // $('#jobCode1').val(data[5]);

        })

    });

    </script>                

    <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="buyModalLabel">Buy Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="updateEmployee.php" method="POST">
                    <div class="modal-body">

                    <div class="modal-body"> 
                        
                    <figure>

                    <!-- Display book image on the left -->
                    <img class = "bookImage" src="<?php echo $select_book['pictureName'] ;?>">

                        <figcaption>

                            <!-- display book name, description, isbn, authors and publisher -->
                            <h2><?php echo $select_book['bookName'];?></h2><br><br><br>
                            <?php echo "Description: ".$select_book['bookDescription']; ?><br><br>
                            <?php echo "Category: ".$genre[0]; ?><br><br>
                            <?php echo "isbn: ".$select_book['isbn']; ?><br><br>
                            <?php echo "author(s): ".$select_book['authors']; ?><br><br>
                            <?php echo "publisher: ".$select_book['publisher']; ?><br><br>

                            <!-- Check if there is discount, yes then display price after discount, no then display full price -->
                            <?php if($select_book['discountPercent'] > 0.00) 
                            {
                                //  Using s tag to cross out original price, and using number_format() to get it to display 2 decimal places
                                echo "<s>$".$select_book['listPrice']."</s>&ensp;Now:&nbsp;$".number_format(($select_book['listPrice'] *(1.00 - $select_book['discountPercent'])), 2, '.', '');
                            }
                            else
                            {
                                echo "$".$select_book['listPrice'];
                            }?>
                        </figcaption>
                    </figure>
                    </div>

                    <!-- order button -->
                    <?php if (isset($_COOKIE['userName'])) {?>
                    <?php $userID = filter_input (INPUT_COOKIE, 'userName', FILTER_VALIDATE_INT); ?>
                    <form action="../controller/index.php" method="post">
                    <input type="hidden" name="user_Action" value="add_orders">
                    <a class="toCart" type="submit" >Order&nbsp;It</a>
                    <input type="hidden" name="userID" value="<?php echo $userID;?>">
                    <input type="hidden" name="bookID" value="<?php echo $select_book['bookID'];?>">
                    </form>
                    <?php }?>

                    <?php if (!isset($_COOKIE['userName'])) {?>
                    <br><br><br><br><br><br>

                    <a class="button">Please login to continue purchase</a>
                    <?php }?>
                                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button name="updateEmp"type="submit" class="btn btn-primary">Add To Cart</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        </div>








</main> 

<?php include('../view/footer.php'); ?>

