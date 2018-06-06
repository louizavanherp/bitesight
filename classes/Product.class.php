<?php
class Product{
    public $title;
    public $image;
    public $fresness;

    public function __construct($db) {
        $this->db = $db;
    }

    ###                     ###
    ### GETTERS AND SETTERS ###
    ###                     ###

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of fresness
     */ 
    public function getFresness()
    {
        return $this->fresness;
    }

    /**
     * Set the value of fresness
     *
     * @return  self
     */ 
    public function setFresness($fresness)
    {
        $this->fresness = $fresness;

        return $this;
    }
    
    ###                     ###
    ###       METHODS       ###
    ###                     ###

    /*public function getAll() {
        $statement = $this->db->prepare("SELECT * FROM products ORDER BY id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }*/

    public function getProductInfo($product_id) {
        $statement = $this->db->prepare("SELECT * 
        FROM stock
        INNER JOIN products
        ON products.id = stock.product_id 
        WHERE products.id = :product_id");
        $statement->bindParam(":product_id", $product_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getNewProductInfo($product_id){
        $statement = $this->db->prepare("SELECT * 
        FROM products
        WHERE id = :product_id");
        $statement->bindParam(":product_id", $product_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addProductToList($product_id) {
        $statement = $this->db->prepare("INSERT INTO list (product_id, quantity) VALUES (:product_id, :quantity)");
        $statement->bindValue(":product_id", $product_id);
        $statement->bindValue(":quantity", 1);
        $statement->execute();
    }

    public function isOnList($product_id) {
        //check if post is reported by current user
        $statement = $this->db->prepare("SELECT * FROM list WHERE product_id = :product_id");
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
        $result = $statement->rowCount();
        return $result;
    }

    public function updateList($product_id){
        $statement = $this->db->prepare("UPDATE list SET quantity = quantity + 1 WHERE product_id = :product_id");
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
    }

    public function updateListMin($product_id){
        $statement = $this->db->prepare("UPDATE list SET quantity = quantity - 1 WHERE product_id = :product_id");
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
    }

    public function countItemsList($product_id){
        $statement = $this->db->prepare("SELECT quantity from list WHERE product_id = :product_id");
        $statement->bindValue(":product_id", $product_id);
        $result = $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getItemsFromList(){
        $statement = $this->db->prepare
        ("SELECT * 
        FROM products 
        INNER JOIN list 
        ON products.id = list.product_id");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteFromList($product_id){
        $statement = $this->db->prepare("DELETE FROM LIST WHERE product_id = :product_id");
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
    }

    public function getSearchedItems($p_product=null)
	{
		if($p_product != "")
		{
			$statement = $this->db->prepare("select * from products where title like :title");
			$statement->bindValue(":title", "%$p_product%");
		}
		
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
