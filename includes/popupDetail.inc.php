<div class="popup">
<?php $title = $product->getProductInfo($productId)['title'];?>
<?php $id = $_GET['id'] ?>
          <!-- popup content -->
          <div class="popup-content">
            <div>
              <span class=close>&times;</span>
              <h1 class='popup-txt'><?php echo $title ?></h1>
            </div>
            <a class="popup-addBtn" href="?id=<?php echo $id ?>&addDetail=<?php echo $id ?>">Voeg toe</a>
          </div>       
  </div>



