<?php

include('../view/header.php');
?>


 
<main>
    
  <!-- /* 11/20/2022 displays all genres and user may choose one. When a button is pressed, it activates href at line 16 */ -->
  <div id = "c-border">

    <?php for($x = 0; $x < sizeof($book_genres); $x++) {?>

      <!-- The categories -->
      <a class="button" href="../controller/index.php?user_Action=categories_result&genre=<?php echo $book_genres[$x]['genreID'];?>"><?php echo $book_genres[$x]['genreName'];?></a>

    <?php }?>
  </div>

      
</main> 
  
<?php include('../view/footer.php'); ?>
