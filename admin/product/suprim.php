<?php
$title ="Delete product";
ob_start();
?>

<?php
$id = $_GET['id'];

require_once 'C:/caisse191124/include/database.php';

$sql ="DELETE FROM products
       WHERE products.id_product =?;";

$sqlPdo = $pdo -> prepare($sql);

$sqlPdo -> execute([$id]);

//Redirection
header('location:index.php');
?>





<?php $content = ob_get_clean(); ?>



<?php $varSell="Sell";$varData="Data";?>
<?php include "c:/caisse191124/layout.php" ?>