<?php
require 'lib/database.php';
require 'lib/meds.php'; 
require_once 'lib/order.php';

require 'lib/config.php';

$order = new order($database);
$medications = new meds($database); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['persc']) && isset($_POST['patientName'])) {
        $persc = $_POST['persc'];
        $patientName = $_POST['patientName'];

        $order->updatePrescription($patientName, $persc);

        header('Location: /');
        exit;
    } else {
        echo "Prescription or Patient Name missing!";
    }
}

// sees medications from table
$availableMedications = $medications->getMedications();
?>

<?php require "layouts/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Prescriptions - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<main>
    <h2>Order Prescription</h2>
    <form method="post" action="order.php">
    <label for="patientName">Patient Name:</label><br>
    <input type="text" id="patientName" name="patientName" required><br><br>

    <label for="persc">Prescription:</label><br>
    <select id="persc" name="persc" required>
        <?php
        // loop through the medications and create options for the dropdown
        foreach ($availableMedications as $medication) {
            echo "<option value=\"" . htmlspecialchars($medication['name']) . "\">" . htmlspecialchars($medication['name']) . "</option>";
        }
        ?>
    </select><br><br>

    <input type="submit" value="Submit Request">
</form>

</main>

<?php require "layouts/footer.php"; ?>

</body>
</html>
