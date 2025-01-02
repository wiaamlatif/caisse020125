<?php
$title ="Index Product";
ob_start();
?>
   <?php $varSell="Sell";$varData="Data";?>
   <?php include "../category/count_items.php" ?> 
   <?php include 'C:\caisse191124\include\nav.php'; ?>

   <h1>Ici Index Product Front</h1>
 

<?php $content = ob_get_clean(); ?>


<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>





