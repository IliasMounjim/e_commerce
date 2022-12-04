 
   <footer style="position: fixed; bottom: 0px; border-top: 2px solid #4070f4 ;">

    <!-- if admin is at categories page, show this button to let them add new categories -->
   <?php if(isset($admin_categories) && $admin_categories == true) { ?>
        <form action="../controller/index.php" method="post">
            <input type="hidden" name="user_Action" value="add_new_categories">
            <input class="new_book" type="submit" name="update" value="Add Categories">
        </form>
    <?php } ?>
    
    <!-- add button at bottom left -->
    <form action="../controller/index.php" method="post">
        <input type="hidden" name="user_Action" value="add_books_form">
        <input class="new_book" type="submit" name="update" value="Add books">
    </form>
    <p class="copyright">
       PHP ASSASSIN SHOP, Inc.
   </p>
</footer>
</body>
</html>
