<?php
require 'lib/connect.php'; 

class patient extends connect {

    public function addPatient($name, $dob, $persc, $address, $emcon) {
        //create method ffor CRUD, adding fresh patient to database, might be swapped for account would be redundant with both of them doing the same thing
        $stmt = $this->db->prepare('INSERT INTO patient (name, dob, persc, address, emcon) VALUES (:name, :dob, :persc, :address, :emcon)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':persc', $persc);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':emcon', $emcon);
        $stmt->execute();
    }

    public function getPatients() {
        return $this->getAll('patient'); 
    }

    public function deletePatient($id) {
        //deletes the id of the patient in the database
        $stmt = $this->db->prepare('DELETE FROM patient WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updatePrescription($name, $persc) {
        //using update pers in the patients
        $stmt = $this->db->prepare('UPDATE patient SET persc = :persc WHERE name = :name');
        $stmt->bindParam(':persc', $persc);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
}
?>
