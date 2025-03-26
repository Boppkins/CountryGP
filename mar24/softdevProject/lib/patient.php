<?php
require_once 'lib/connect.php';

class patient extends connect {

    public function addPatient($patientName, $dob, $medicationId, $address, $emcon, $accountID) {
        $data = [
            'patientName' => $patientName,
            'dob' => $dob,
            'medication_id' => $medicationId, // Changed to medication_id
            'address' => $address,
            'emcon' => $emcon,
            'accountID' => $accountID
        ];
        
        return $this->insert('patient', $data);
    }
    

    public function getPatients() {
        $query = "SELECT p.patientID, p.patientName, p.dob, p.address, p.emcon, p.persc, m.name AS medication_name
                  FROM patient p
                  LEFT JOIN medications m ON p.medication_id = m.id";  // Join on medication_id with medications table
    
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // In lib/patient.php
public function deletePatient($patientID) {
    // First, retrieve the accountID of the patient
    $stmt = $this->db->prepare("SELECT accountID FROM patient WHERE patientID = :patientID");
    $stmt->bindParam(':patientID', $patientID);
    $stmt->execute();
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if patient exists and has an accountID
    if ($patient && isset($patient['accountID'])) {
        $accountID = $patient['accountID'];

        // Delete the patient record
        $stmt = $this->db->prepare("DELETE FROM patient WHERE patientID = :patientID");
        $stmt->bindParam(':patientID', $patientID);
        $stmt->execute();

        // Delete the associated account record
        $stmt = $this->db->prepare("DELETE FROM account WHERE accountID = :accountID");
        $stmt->bindParam(':accountID', $accountID);
        $stmt->execute();
    } else {
        // Patient not found or doesn't have an associated accountID
        throw new Exception("Patient not found or no associated account found.");
    }
}

    public function updateMedication($patientName, $medicationId) {
        $data = ['medication_id' => $medicationId];
        $stmt = $this->update('patient', $data, $patientName);
    }
}
?>
