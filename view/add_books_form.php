<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
* Version - 20221022
*/

include('../view/admin_header.php');
?>

<main>

    <?php if(isset($success)){?>
        <div class="added">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $success ;?>
        </div>
    <?php } ?>

    <!-- A form that submits all values when admin click submit  -->
    <form class = "add_book_form" action="../controller/index.php" method="post">
    <input type="hidden" name="user_Action" value="add_books">
        
        <!-- Let admin enters book name  -->
        <div class="big_text"><label>Book&nbsp;Name:&emsp;</label>
        <textarea rows="2" cols="25" name="bookName"></textarea><br><br>
            
        <!-- Let admin enters book description  -->
        <label>Book&nbsp;Description:&emsp;</label>
        <textarea rows="4" cols="50" name="bookDescription"></textarea>
        </div><br><br>
            
        <!-- Let admin enters price  -->
        <label>List&nbsp;Price:&emsp;$</label>
        <input type="float" name="listPrice"><br><br><br>

        <!-- Let admin enters discount  -->
        <label>Discount:&emsp;</label>
        <input type="float" value = "0.00" name="discountPercent">&nbsp;%<br><br><br>
            
        <!-- Let admin enters isbn  -->
        <label>Isbn&emsp;</label>
        <input type="text" name="isbn"><br><br><br>

        <label>Author:&emsp;</label>
        <input type="text" name="authors"><br><br><br>

        <label>Publisher:&emsp;</label>
        <input type="text" name="publisher"><br><br><br>

        <label>Picture&nbsp;Name:&emsp;</label>
        <input type="text" name="pictureName"><br><br><br>

        <!-- Let admin choose new employee's job title  -->
   
        <label>Book&nbsp;Genre(Please select from box):&emsp;</label>
        <select name="genreID">
        <!-- Using for loop to display all the avilable job title in the job table  -->
        <?php foreach ($all_genres as $all_genre) : ?>
            <!-- Using selected attribute to set the default to what the admin chose after admin's input failed to pass validation  -->
            <option value="<?php echo $all_genre['genreID']; ?>">
                <?php echo $all_genre['genreName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br><br><br>
            
        <!-- Submit the above form  -->
        <label></label>
        <input type="submit" value="Add Book"><br><br>
    </form>


</main>

<?php include('../view/footer.php'); ?>