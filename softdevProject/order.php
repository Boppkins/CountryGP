<?php
require 'lib/database.php';
require 'lib/meds.php'; 
require_once 'lib/order.php';
require 'lib/config.php';

session_start();

$order = new order($database);
$medications = new meds($database); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user']) && isset($_POST['persc'])) {
        $persc = $_POST['persc'];
        $patientName = $_SESSION['user']['name'];

        $order->updatePrescription($patientName, $persc);

        header('Location: /'); // Redirect after success
        exit;
    } else {
        echo "You must be logged in and provide a prescription.";
    }
}

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

    <?php if (isset($_SESSION['user'])): ?>
        <p>Ordering as: <strong><?php echo htmlspecialchars($_SESSION['user']['name']); ?></strong></p>

        <form method="post" action="order.php">
            <label for="persc">Prescription:</label><br>
            <select id="persc" name="persc" required>
                <?php foreach ($availableMedications as $medication): ?>
                    <option value="<?php echo htmlspecialchars($medication['name']); ?>">
                        <?php echo htmlspecialchars($medication['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>

            <input type="submit" value="Submit Request">
        </form>
    <?php else: ?>
        <p style="color: red;">Please <a href="login.php">log in</a> to order a prescription.</p>
    <?php endif; ?>

</main>

<?php require "layouts/footer.php"; ?>

</body>
</html>
