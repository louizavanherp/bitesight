<div class="popup">
<?php $idDP = $_GET['id']; ?>
<?php $title = $product->getProductInfo($idDP)['title'];?>
          <!-- popup content -->
          <div class="popup-content">
            <div>
              <span class=close>&times;</span>
              <h1 class='popup-txt'><?php echo $title ?></h1>
            </div>
            <a class="popup-addBtn" href="?id=<?php echo $productId; ?>&addDetail=<?php echo $productId; ?>&addHome=<?php echo $productId; ?>">Voeg toe</a>
          </div>       
  </div>



