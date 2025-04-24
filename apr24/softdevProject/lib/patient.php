<?php
require_once 'lib/connect.php';

class patient extends connect {

    // for adding a patient, vars in constructor are whats expected to be filled or assigned by aa
    public function addPatient($patientName, $dob, $medicationId, $address, $emcon, $accountID) {
        $data = [
            'patientName' => $patientName,
            'dob' => $dob,
            'medication_id' => $medicationId,
            'address' => $address,
            'emcon' => $emcon,
            'accountID' => $accountID
        ];
        
        // insert the patient data into the database
        return $this->insert('patient', $data);
    }

    // ges all patients
    public function getPatients() {
        // DONT MESS WITH. basically pulling medication_id to show what medication the patient is assigned to 
        $query = "SELECT p.patientID, p.patientName, p.dob, p.address, p.emcon, p.persc, m.name AS medication_name
                  FROM patient p
                  LEFT JOIN medications m ON p.medication_id = m.id"; 
    
        // run the query
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // method to delete a patient and their associated account
    public function deletePatient($patientID) {
        // basically deletes the account id, in turn deleting the patient with the assigned account id
        $stmt = $this->db->prepare("SELECT accountID FROM patient WHERE patientID = :patientID");
        $stmt->bindParam(':patientID', $patientID);
        $stmt->execute();
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        // check if patient exists and has an account id
        if ($patient && isset($patient['accountID'])) {
            $accountID = $patient['accountID'];

            // deletes the patient record
            $stmt = $this->db->prepare("DELETE FROM patient WHERE patientID = :patientID");
            $stmt->bindParam(':patientID', $patientID);
            $stmt->execute();

            // deletes the associated account record
            $stmt = $this->db->prepare("DELETE FROM account WHERE accountID = :accountID");
            $stmt->bindParam(':accountID', $accountID);
            $stmt->execute();
        } else {
            // shouldnt be needed since when a patient is added, an account is too, but still just to say we have exceptions
            throw new Exception("Patient not found or no associated account found.");
        }
    }

    // updates patients medication
    public function updateMedication($patientName, $medicationId) {
        $data = ['medication_id' => $medicationId];
        $stmt = $this->update('patient', $data, $patientName);
    }
}
?>
