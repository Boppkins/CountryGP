<?php
require_once 'lib/connect.php';

class appointment extends connect {

    // add an appointment to the database
    public function addAppointment($patientID, $employeeID, $date, $time, $description) {
        $stmt = $this->db->prepare('INSERT INTO appointment (patientID, employeeID, date, time, description) VALUES (:patientID, :employeeID, :date, :time, :description)');
        $stmt->bindParam(':patientID', $patientID);
        $stmt->bindParam(':employeeID', $employeeID);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    // get all appointments for a specific patient or all appointments
    public function getAppointments($patientName = null) {
        if ($patientName) {
            $stmt = $this->db->prepare('SELECT * FROM appointment WHERE patientID = :patientID');
            $stmt->bindParam(':patientID', $patientID);
        } else {
            $stmt = $this->db->query('SELECT * FROM appointment');
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // delete an appointment
    public function deleteAppointment($appointmentID) {
        $stmt = $this->db->prepare('DELETE FROM appointment WHERE appointmentID = :appointmentID');
        $stmt->bindParam(':appointmentID', $appointmentID, PDO::PARAM_INT);
        $stmt->execute();
    }

    // update an appointment
    public function updateAppointment($appointmentID, $date, $time, $description) {
        $stmt = $this->db->prepare('UPDATE appointment SET date = :date, description = :description WHERE appointmentID = :appointmentID');
        $stmt->bindParam(':appointmentID', $appointmentID, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }
}
?>
