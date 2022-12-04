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
        <input type="hidden" name="user_Action" value="add_categories">

        <!-- Let admin enters price  -->
        <label>New&nbsp;Category&nbsp;Name:&emsp;</label>
        <input type="text" name="genreName"><br><br><br>

        <!-- Submit the above form  -->
        <label></label>
        <input type="submit" value="Add Categories"><br><br>
    </form>

</main>

<?php include('../view/footer.php'); ?>