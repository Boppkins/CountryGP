<?php
require 'lib/database.php';
require 'lib/patient.php';

//pulls connection from config
require 'lib/config.php';

$patientModel = new patient($database);
$patients = $patientModel->getPatients();

require "layouts/header.php";  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Roster - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<main>
    <h2>Patient List</h2>
    <?php foreach ($patients as $patient) : ?>
    <div class="patient-card">
        <div class="patient-info">
            <p>Name: <?php echo htmlspecialchars($patient['name']); ?></p>
            <p>Date of Birth: <?php echo htmlspecialchars($patient['dob']); ?></p>
            <p>Prescription: <?php echo htmlspecialchars($patient['persc']); ?></p>
            <p>Address: <?php echo htmlspecialchars($patient['address']); ?></p>
            <p>Emergency Contact: <?php echo htmlspecialchars($patient['emcon']); ?></p>
        </div>
        <form method="post" action="patients.php">
            <input type="hidden" name="delete_id" value="<?php echo $patient['id']; ?>">
            <input type="submit" value="Delete Patient">
        </form>
    </div>
    <?php endforeach; ?>

    <h2>Add Patient</h2>
    <form method="post" action="patients.php">
        <label for="name">Full Name: </label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dob">Date of Birth: </label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="persc">Prescription: </label><br>
        <input type="text" id="persc" name="persc"><br><br>

        <label for="address">Address: </label><br>
        <input type="text" id="address" name="address" required><br><br>

        <label for="emcon">Emergency Contact: </label><br>
        <input type="text" id="emcon" name="emcon" required><br><br>

        <input type="submit" value="Confirm Patient">
    </form>
</main>

</body>

<?php
require "layouts/footer.php"; 
?>
