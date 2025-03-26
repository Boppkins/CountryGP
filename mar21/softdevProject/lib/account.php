<?php
require 'lib/connect.php'; 

class account extends connect {

    public function addAccount($name, $email, $password) {
        //create method ffor CRUD, adding fresh patient to database, might be swapped for account would be redundant with both of them doing the same thing
        $stmt = $this->db->prepare('INSERT INTO account (name, email, password) VALUES (:name, :email, :password)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function getAccounts() {
        return $this->getAll('account'); 
    }
}
?>
