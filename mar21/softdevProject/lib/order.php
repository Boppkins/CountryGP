<?php
require 'lib/connect.php';  

class order extends connect {

    public function updatePrescription($name, $persc) {
        //init update for CRUD implementation, updates patients pers(might be changed to drop-down list cause can type anything)
        $stmt = $this->db->prepare('UPDATE patient SET persc = :persc WHERE name = :name');
        $stmt->bindParam(':persc', $persc);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
}
?>
