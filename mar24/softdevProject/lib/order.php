<?php
require_once 'lib/connect.php';

class order extends connect {

    public function updatePrescription($patientName, $persc) {
        // Update patient's prescription where patientName matches
        $stmt = $this->db->prepare('UPDATE patient SET persc = :persc WHERE patientName = :patientName');
        $stmt->bindParam(':persc', $persc);
        $stmt->bindParam(':patientName', $patientName);
        $stmt->execute();
    }    
}
?>
