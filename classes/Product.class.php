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

    public function getAll() {
        $statement = $this->db->prepare("SELECT * FROM products ORDER BY id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFresh() {
        $statement = $this->db->prepare("SELECT * FROM products WHERE freshness = 1 ORDER BY id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEatable() {
        $statement = $this->db->prepare("SELECT * FROM products WHERE freshness = 2 ORDER BY id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExpired() {
        $statement = $this->db->prepare("SELECT * FROM products WHERE freshness = 3 ORDER BY id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductInfo($product_id) {
        $statement = $this->db->prepare("SELECT * FROM products WHERE id = :product_id");
        $statement->bindParam(":product_id", $product_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($product_id) {
        $statement = $this->db->prepare("DELETE FROM products WHERE id = :product_id");
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
    }

    
    public function addProductToList($product_id) {
        $statement = $this->db->prepare("INSERT INTO list (product_id) VALUES (:product_id)");
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
    }

    public function getItemsFromList(){
        $statement = $this->db->prepare
        ("SELECT * 
        FROM list 
        INNER JOIN products 
        ON products.id = list.product_id");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>
