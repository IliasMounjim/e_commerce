<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
* Version - 20221022
*/

include('../view/admin_header.php');
?>
<main>

<!-- A form that submits all values when admin click submit  -->
<form class = "add_book_form" action="../controller/index.php" method="post">
    <input type="hidden" name="user_Action" value="update_books">
    <input type="hidden" name="bookID" value="<?php echo $target[0]; ?>">
        
        <!-- Let admin enters book name  -->
        <div class="big_text"><label>Book&nbsp;Name:&emsp;</label>
        <textarea rows="2" cols="25" name="bookName"><?php echo $target[2];?></textarea><br><br>
            
        <!-- Let admin enters book description  -->
        <label>Book&nbsp;Description:&emsp;</label>
        <textarea rows="4" cols="50" name="bookDescription"><?php echo $target[3];?></textarea>
        </div><br><br>
            
        <!-- Let admin enters price  -->
        <label>List&nbsp;Price:&emsp;$</label>
        <input type="float" value="<?php echo $target[4];?>" name="listPrice"><br><br><br>

        <!-- Let admin enters discount  -->
        <label>Discount:&emsp;</label>
        <input type="float" value="<?php echo $target[5];?>" name="discountPercent">&nbsp;%<br><br><br>
            
        <!-- Let admin enters isbn  -->
        <label>Isbn&emsp;</label>
        <input type="text" value="<?php echo $target[6];?>" name="isbn"><br><br><br>

        <label>Author:&emsp;</label>
        <input type="text" value="<?php echo $target[7];?>" name="authors"><br><br><br>

        <label>Publisher:&emsp;</label>
        <input type="text" value="<?php echo $target[8];?>" name="publisher"><br><br><br>

        <label>Picture&nbsp;Name:&emsp;</label>
        <input type="text" value="<?php echo $pictureName_short;?>" name="pictureName"><br><br><br>

        <!-- Let admin choose new employee's job title  -->
   
        <label>Book&nbsp;Genre(Please select from box):&emsp;</label>
        <select name="genreID">
        <!-- Using for loop to display all the avilable job title in the job table  -->
        <?php foreach ($all_genres as $all_genre) : ?>
            <!-- Set the book's original genre as default case  -->
            <option value="<?php echo $all_genre['genreID']; ?>" <?php if($target[1] == $all_genre['genreID']) {echo ' selected="selected"';}?>>
                <?php echo $all_genre['genreName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br><br><br>
            
        <!-- Submit the above form  -->
        <div class= "middle">
        <label></label>
        <input  type="submit" value="Update Book"><br><br>
        </div>
    </form>
    <br><br><br><br><br>

</main>

<?php include('../view/admin_footer.php'); ?>