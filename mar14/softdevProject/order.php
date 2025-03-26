<!DOCTYPE html>
<html>
<head>
    <title>Order Prescriptions - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php
require 'lib/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //will do for now but could add in so perscriptions add up like "panadol, calpol"
    //rn only 1 perscription at a time
    if (isset($_POST['persc']) && isset($_POST['name'])) {
        $persc = $_POST['persc'];
        $name = $_POST['name'];

        update_patient_prescription($name, $persc);

        header('Location: /');
        die;
    } else {
        echo "Prescription or Patient Name missing!";
    }
}
?>

<?php require "layouts/header.php"; ?>


<main>
    <h2>Order Prescription</h2>
    <form method="post" action="order.php">
        <label for="name">Patient Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="persc">Prescription:</label><br>
        <input type="text" id="persc" name="persc" required><br><br>

        <input type="submit" value="Submit Request">
    </form>
</main>
    <?php require "layouts/footer.php"; ?>

</body>
</html>
