<!DOCTYPE html>
<html>
<head>
    <title>Patient Roster - County GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php
require 'lib/functions.php';

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    delete_patient($delete_id);  
    header('Location: /');  
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name = 'NAME REQUIRED';
    }

    if (isset($_POST['dob'])) {
        $dob = $_POST['dob'];
    } else {
        $dob = 'DOB REQUIRED';
    }

    if (isset($_POST['persc'])) {
        $persc = $_POST['persc'];
    } else {
        $persc = 'No perscription';
    }

    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $address = 'ADDRESS REQUIRED';
    }

    if (isset($_POST['emcon'])) {
        $emcon = $_POST['emcon'];
    } else {
        $emcon = 'EMERGENCY CONTACT REQUIRED';
    }

    add_patients($name, $dob, $persc, $address, $emcon);

    header('Location: /');
    die;
}
?>

<?php require "layouts/header.php"; ?>

<main>
    <h2>Patient List</h2>
    <?php 
    $patients = get_patients(); 
    foreach ($patients as $patient) : ?>
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
    //splitting name into first name and last name for account 
    <form method="post" action="patients.php">
        <label for="name">Full Name: </label><br>
        <input type="text" id="name" name="name" required placeholder="John Doe"><br><br>

        <label for="dob">Date of Birth: </label><br>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="persc">Prescription: </label><br>
        <input type="text" id="persc" name="persc"><br><br>

        <label for="address">Address: </label><br>
        <input type="text" id="address" name="address" required><br><br>

        <label for="emcon">Emergency Contact: </label><br>
        <input type="text" id="emcon" name="emcon" required placeholder="Name-Realtionship-Contact"><br><br>

        <input type="submit" value="Confirm Patient">
    </form>
</main>
    <?php require "layouts/footer.php"; ?>

</body>
</html>
