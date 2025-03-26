<?php
require 'lib/database.php';
require 'lib/appointment.php';

// Pulls the database connection from config
require 'lib/config.php';

// Initialize the Appointment model
$appointmentModel = new appointment($database);

// Handle form submission for adding new appointment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['patientID'], $_POST['employeeID'], $_POST['date'], $_POST['time'], $_POST['description'])) {
        $appointmentModel->addAppointment($_POST['patientID'], $_POST['employeeID'], $_POST['date'], $_POST['time'], $_POST['description']);
        header('Location: appointments.php'); // Redirect after adding
        exit;
    }

    if (isset($_POST['delete_id'])) {
        $appointmentModel->deleteAppointment($_POST['delete_id']);
        header('Location: appointments.php'); // Redirect after deletion
        exit;
    }
}

// Fetch appointments from the database
$appointments = $appointmentModel->getAppointments();
require "layouts/header.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments - Country GP</title>
    <link rel="stylesheet" href="css.css"> <!-- Linking to your CSS file -->
</head>
<body>

<main>
    <h2>Appointments</h2>

    <!-- Display the appointments -->
    <h3>Upcoming Appointments</h3>
    <?php foreach ($appointments as $appointment) : ?>
    <div class="appointment-card">
        <div class="appointment-info">
            <p><b>Patient Name:</b> <?php echo htmlspecialchars($appointment['patientName']); ?></p>
            <p><b>Doctor Name:</b> <?php echo htmlspecialchars($appointment['employeeName']); ?></p>
            <p><b>Date:</b> <?php echo htmlspecialchars($appointment['date']); ?></p>
            <p><b>Time:</b> <?php echo htmlspecialchars($appointment['time']); ?></p>
            <p><b>Description:</b> <?php echo htmlspecialchars($appointment['description']); ?></p>
        </div>

        <!-- Delete Appointment -->
        <form method="post" action="appointments.php">
            <input type="hidden" name="delete_id" value="<?php echo $appointment['appointmentID']; ?>">
            <input type="submit" value="Delete Appointment">
        </form>
    </div>
    <?php endforeach; ?>

    <h3>Book a New Appointment</h3>
    <form method="post" action="appointments.php">
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName" required><br><br>

        <label for="doctor_id">Doctor ID:</label><br>
        <input type="text" id="doctorID" name="doctorID" required><br><br>

        <label for="date">Date:</label><br>
   
