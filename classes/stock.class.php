<?php
class Stock{

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $statement = $this->db->prepare
        ("SELECT * 
        FROM products
        INNER JOIN stock
        ON stock.product_id = products.id
        ORDER BY stock.product_id 
        ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($stockItem_id) {
        $statement = $this->db->prepare("DELETE FROM stock WHERE id = :stockItem_id");
        $statement->bindValue(":stockItem_id", $stockItem_id);
        $statement->execute();
    }

    public function getProductInfo($stockItem_id) {
        $statement = $this->db->prepare
        ("SELECT * 
        FROM products 
        INNER JOIN stock
        ON stock.product_id = products.id
        WHERE stock.id = :stockItem_id");
        $statement->bindParam(":stockItem_id", $stockItem_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //get filters
    public function getFresh() {
        $statement = $this->db->prepare
        ("SELECT * 
        FROM stock
        INNER JOIN products
        ON stock.product_id = products.id 
        WHERE freshness = 1 
        ORDER BY products.id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEatable() {
        $statement = $this->db->prepare
        ("SELECT * 
        FROM products
        INNER JOIN stock
        ON stock.product_id = products.id 
        WHERE freshness = 2
        ORDER BY products.id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExpired() {
        $statement = $this->db->prepare
        ("SELECT * 
        FROM products
        INNER JOIN stock
        ON stock.product_id = products.id 
        WHERE freshness = 3 
        ORDER BY products.id ASC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}


?>
