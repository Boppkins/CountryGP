<?php
require_once 'lib/connect.php';

class meds extends connect {
    // fetchs all medications from the database
    public function getMedications() {
        $stmt = $this->db->prepare("SELECT id, name FROM medications");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
