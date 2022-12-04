<?php

/*
 * Description: 
 * Author - Eli Mounjim
 * Version - 20221022
 */

include('../view/header.php');
?>

<main>

    <?php if(isset($error_msg)) {?>

      <div class="error-wrapper" style="text-align:center">
        <h1><?php echo $error_msg; ?></h1>
      </div>

    <?php }?>
    
    <?php if(!isset($error_msg)) {?>
    <div class="error-wrapper" style="text-align:center">
        <h1>Ouups!! Something went wrong!</h1>
    </div>
    <?php }?>


</main> 
  

<?php include('../view/footer.php'); ?>
