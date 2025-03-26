<?php
require 'lib/patient.php';

//pulls connection from config
require 'lib/config.php';

$patientModel = new patient($database);
$patients = $patientModel->getPatients();  // Fetch patients including their medication details

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
            <p>Name: <?php echo htmlspecialchars($patient['patientName']); ?></p>
            <p>Date of Birth: <?php echo htmlspecialchars($patient['dob']); ?></p>
            <p>Prescription: <?php echo htmlspecialchars($patient['persc']); ?></p>
            <p>Address: <?php echo htmlspecialchars($patient['address']); ?></p>
            <p>Emergency Contact: <?php echo htmlspecialchars($patient['emcon']); ?></p>
        </div>
        <form method="post" action="patients.php">
            <input type="hidden" name="delete_id" value="<?php echo $patient['patientID']; ?>">
            <input type="submit" value="Delete Patient">
        </form>
    </div>
    <?php endforeach; ?>
</main>

</body>

<?php
require "layouts/footer.php"; 
?>
