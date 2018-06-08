<?php
class user{

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserInformation($user_id){
        $statement = $this->db->prepare("SELECT * 
        FROM user
        WHERE id = :userId");
        $statement->bindParam(":userId", $user_id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function editInformation($user_id, $name, $email){
        $statement = $this->db->prepare("UPDATE user SET name = :name, email = :email WHERE id = :userId");
        $statement->bindParam(":userId", $user_id);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->execute();
    }

    public function changePassword($user_id, $newPassword){
        $statement = $this->db->prepare("UPDATE user SET password = :newPassword WHERE id = :userId");
        $statement->bindParam(":userId", $user_id);
        $statement->bindParam(":newPassword", $newPassword);
        $statement->execute();
    }
}

?>