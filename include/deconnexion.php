<?php
$title ="Deconnexion";
ob_start();
?>
<?php
    session_start();

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    //redirection
    header('location:../index.php');
?>
   
<?php $content = ob_get_clean(); ?>


<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'?>