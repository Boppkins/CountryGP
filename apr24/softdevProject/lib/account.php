<?php
require_once 'lib/connect.php';

class account extends connect {
    public function addAccount($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  
        $stmt = $this->db->prepare('INSERT INTO account (name, email, password) VALUES (:name, :email, :password)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword); 
        $stmt->execute();
        
        // return last insert id for further use
        return $this->db->lastInsertId(); 
    }
    
    
    public function getAccounts() {
        return $this->getAll('account'); 
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM account WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // return the user data 
            return $user;
        }
        return false; 
    }
}
?>
