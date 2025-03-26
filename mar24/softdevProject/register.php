<?php
require 'lib/database.php';
require 'lib/account.php';
require 'lib/patient.php';
require 'lib/meds.php';  // Include meds class to fetch medications
require 'lib/config.php';

$account = new account($database);
$patient = new patient($database); 
$meds = new meds($database); // Instantiate meds class to get medications

// Fetch all medications for the dropdown
$medications = $meds->getMedications(); 

// Check if POST data is received
if (isset($_POST['patientName'], $_POST['email'], $_POST['password'], $_POST['dob'], $_POST['address'], $_POST['emcon'], $_POST['medication_id'])) {
    // Step 1: Add the account to the account table and get the accountID
    $accountID = $account->addAccount($_POST['patientName'], $_POST['email'], $_POST['password']);
    
    if ($accountID) {
        // Step 2: Add patient info to the patient table, including the medication_id
        $patient->addPatient($_POST['patientName'], $_POST['dob'], $_POST['medication_id'], $_POST['address'], $_POST['emcon'], $accountID);
        
        // Redirect to a page after successful registration
        header('Location: showregister.php');  
        exit;
    } else {
        echo "Failed to add account!<br>";
    }
}


?>

<?php require "layouts/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Register - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<main>
    <h2>Account Registration</h2>
    <?php
// Fetch medications from the database
$medications = $database->getConnection()->query("SELECT * FROM medications")->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="post" action="register.php">
    <label for="patientName">Full Name: </label><br>
    <input type="text" id="patientName" name="patientName" required><br><br>

    <label for="email">Email: </label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password: </label><br>
    <input type="password" id="password" name="password" required><br><br>

    <!-- Patient Fields -->
    <label for="dob">Date of Birth: </label><br>
    <input type="date" id="dob" name="dob" required><br><br>

    <label for="address">Address: </label><br>
    <input type="text" id="address" name="address" required><br><br>

    <label for="emcon">Emergency Contact: </label><br>
    <input type="text" id="emcon" name="emcon" required><br><br>

    <!-- Medication Selection -->
    <label for="medication">Select Medication: </label><br>
    <select name="medication_id" id="medication" required>
        <option value="">Select Medication</option>
        <?php foreach ($medications as $med) : ?>
            <option value="<?php echo $med['id']; ?>"><?php echo htmlspecialchars($med['name']); ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="submit" value="Confirm Account">
</form>

</main>

</body>
</html>
