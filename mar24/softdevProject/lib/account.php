<?php
require_once 'lib/connect.php';

class account extends connect {
    public function addAccount($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);  // Assign to variable first
        $stmt = $this->db->prepare('INSERT INTO account (name, email, password) VALUES (:name, :email, :password)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);  // Bind the hashed password variable
        $stmt->execute();
        
        // Return last insert ID for further use
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
            // Return the user data to start a session
            return $user;
        }
        return false; // If login fails
    }
}
?>