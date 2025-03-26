<?php
require 'lib/database.php';
require 'lib/patient.php';

//pulls connection from config
require 'lib/config.php';

$patient = new patient($database);

//form to add patient and delete method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_id'])) {
        $patient->deletePatient($_POST['delete_id']);  // Calls the correct deletePatient method
        header('Location: showpatients.php'); 
        exit;
    }

    if (isset($_POST['name'], $_POST['dob'], $_POST['address'], $_POST['emcon'])) {
        $patientModel = $patient->addPatient($_POST['name'], $_POST['dob'], $_POST['persc'], $_POST['address'], $_POST['emcon']);
        header('Location: showpatients.php');  
        exit;
    }

    if (isset($_POST['delete_id'])) {
        $patient->deletePatient($_POST['delete_id']);
        header('Location: showpatients.php');
        exit;
    }
    
}
?>
