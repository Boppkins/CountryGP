<?php
require 'lib/database.php';
require 'lib/order.php';

//pulls connection from config
require 'lib/config.php';

$order = new order($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // checks for persc and name, these are used to assign a new persc to a patient of that name
    // might change to email to narrow down as ppl might have the same names
    if (isset($_POST['persc']) && isset($_POST['name'])) {
        $persc = $_POST['persc'];
        $name = $_POST['name'];

        $order->updatePrescription($name, $persc);

        header('Location: /');
        exit;
    } else {
        echo "Prescription or Patient Name missing!";
    }
}
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