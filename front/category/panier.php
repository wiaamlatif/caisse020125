<?php include "count_items.php" ?> 
<?php include 'C:\caisse191124\include\nav.php'; ?>
<?php $title ="Panier"; ?>

<?php ob_start();?>

    <div class="container py-2">            
        <div class="row justify-content-md-center">
          <div class="col">
              <?php
              if(empty($panier)){
              ?>
              <div class='alert alert-warning' role='alert'>
                  Votre panier est vide !
              </div>
              <?php       
              }else{
              ?>             
              <table class="table table-striped table-hover">    
                <thead>
                  <tr><!-- table row--->
                  <th width="10%">Id</th><!-- table head--->       
                  <th width="10%">Category</th><!-- table head--->       
                  <th width="20%">imgSrc</th>          
                  <th width="20%">Product</th>          
                  <th width="10%" style="text-align:center;">Quantite</th> 
                  <th width="10%">Prix</th> 
                  <th width="20%">Total</th>                             
                  </tr>
                </thead>
                <tbody>
                    <?php // Display cart's items    
                      if(!empty($panier)){

                      require_once 'C:/caisse191124/include/database.php';

                      $prd=array_keys($panier);

                      $prdPanier=implode(",",$prd);

                      $sqlstm = $pdo -> prepare('SELECT * FROM products 
                      INNER JOIN categories 
                      ON products.id_category = categories.id_category
                      WHERE id_product IN (' . $prdPanier . ') ');
                      $sqlstm -> execute();
                      $prdPanier = $sqlstm -> fetchAll(PDO::FETCH_ASSOC);
                      }
                    ?>              
                    <?php   
                      $totalTicket=0;        
                      foreach ($prdPanier as $produit){ 
                      $idProduct=$produit['id_product'];
                      $idCategory=$produit['id_category'];
                      $quantityItem=$panier[$produit['id_product']];
                      $totalItem=$produit['price']*$quantityItem;
                      $totalTicket+=$totalItem;           
                    ?>              
                    <tr>
                      <td><?=$idProduct?></td>

                      <td><?=$produit['name_category']?></td>

                      <td>            
                      <img class="img img-fluid" src="/uploads/products/<?=$produit['imgSrc']?>" width="70px" alt="">
                      </td>           

                      <td><?=$produit['name_product']?></td>

                      <td><!---Quantity---------------->                    
                      <!---Quantity--->
                      <?php include "quantity.php";        ?>
                      <!---Quantity--->
                      </td><!---Quantity Quantity---------------->            

                      <td class="tdPrice"><?=$produit['price']?></td>

                      <td class="tdtotalItem"><strong><?=$totalItem?></strong></td>

                    </tr>  
                    <?php     
                    }                             
                    ?>          
                </tbody> 
                <tfoot>
                  <tr>
                  <th colspan="6" style="text-align:right;" ><strong>Total</strong></th>
                  <th id="thtotalTicket"><strong><?=$totalTicket?></strong></th>
                  </tr>    
                  <tr>
                  <th colspan="6" style="text-align:right;" >
                  <form action="" method="post">                  
                  <div class="d-flex mb-3 justify-content-end">                    

                  <input type="submit" name="valider" class="btn btn-success mx-1" value="Valider">
                  <input type="submit" name="vider"   class="btn btn-danger" value="Vider" onclick="return confirm('Confirmer vider panier?')">                                      

                  </div>
                  </form>            
                  </th>          
                  </tr>    
                </tfoot> 
              </table>                                            
              <?php
                }
              ?>  
          </div><!---col--->                                              
        </div><!---row--->
    </div><!-----container py-2 --->

<?php $content = ob_get_clean(); ?>

<?php

  if(isset($_POST['valider'])){
    
    session_start();      
    if(empty($_SESSION) || !isset($_SESSION) || $_SESSION['user']['role']===0){
      header('location:http://localhost:8000/include/connexion.php');
    } else {      
      header('location:http://localhost:8000/front/category/savePanier.php');
    }
  }


?>

<?php
//setcookie("user", "", time() - 3600);
if(isset($_POST['vider'])){          
    //Delete cookie named $i
  for ($i=0; $i < 1000; $i++) { 
    $cookie_name=$i;
    setcookie($cookie_name,"", time() - 3600, '/');   
  }
} 
?>


<?php $varSell="Sell";$varData="Data";?>
<?php require_once 'C:\caisse191124\layout.php'; ?>  

<?php   
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";die();
?>   

