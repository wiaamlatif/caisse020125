<?php include "C:/caisse191124/front/category/count_items.php"?>

<?php $title ="Home"; ?>

<?php ob_start();?>

    <?php  include 'include\nav.php';?>
    
    <h1 class="testo">Home</h1>


<?php $content = ob_get_clean(); ?>


<?php require_once 'layout.php';?>     