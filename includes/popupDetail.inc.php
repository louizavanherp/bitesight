<div class="popup">
<?php $title = $productInfo['title']?>
<?php $id = $_GET['id'] ?>
          <!-- popup content -->
          <div class="popup-content">
            <div>
              <span class=close>&times;</span>
              <h1 class='popup-txt' data-productid="<?php echo $_GET['id'] ?>"><?php echo $title ?></h1>
            </div>
            <div class="calc calc--detail"> 
                <a href="#" class="calc__min calc__min--detail" ><img src="images/icon/min.svg" alt="min"></a>
                <p class="calc__quantity calc__quantity--detail">1</p>
                <a href="#" class="calc__plus calc__plus--detail"><img src="images/icon/plus.svg" alt="plus"></a>
            </div>
            <a class="popup-addBtn popup-addBtn--detail" href="?id=<?php echo $id ?>&addDetail=<?php echo $id ?>">Voeg toe</a>
          </div>       
  </div>



