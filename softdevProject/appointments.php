<?php
// MAY JUST NEED TO SCRAP TBH
require 'lib/database.php';
require 'lib/appointment.php';

require 'lib/config.php';

$appointmentModel = new appointment($database);

// form for adding new patients
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['patientID'], $_POST['employeeID'], $_POST['date'], $_POST['description'])) {
        $appointmentModel->addAppointment($_POST['patientID'], $_POST['employeeID'], $_POST['date'], $_POST['description']);
        header('Location: appointments.php'); 
        exit;
    }
}

// fetchs appointments from the database
$appointments = $appointmentModel->getAppointments();
require "layouts/header.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments - Country GP</title>
    <link rel="stylesheet" href="css.css"> 
</head>
<body>

<main>
    <h2>Appointments</h2>

    <h3>Upcoming Appointments</h3>
    <?php foreach ($appointments as $appointment) : ?>
    <div class="appointment-card">
        <div class="appointment-info">
            <p><b>Patient Name:</b> <?php echo htmlspecialchars($appointment['patientName']); ?></p>
            <p><b>Doctor Name:</b> <?php echo htmlspecialchars($appointment['employeeName']); ?></p>
            <p><b>Date:</b> <?php echo htmlspecialchars($appointment['date']); ?></p>
            <p><b>Description:</b> <?php echo htmlspecialchars($appointment['description']); ?></p>
        </div>

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

        <label for="doctor_id">Doctor Name:</label><br>
        <input type="text" id="doctorID" name="doctorID" required><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <input type="submit" value="Book Appointment">
    </form>
</main>

</body>
</html>
