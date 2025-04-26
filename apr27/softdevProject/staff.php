<?php
require 'lib/database.php';
require 'lib/employee.php';

// pulls connection from config
require 'lib/config.php';

$employeeModel = new employee($database);
$employees = $employeeModel->getEmployees();

require "layouts/header.php";  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Staff Roster - Country GP</title>
    <link rel="stylesheet" href="css.css"> 
</head>
<body>

<main>
    <h2>Staff List</h2>
    <?php foreach ($employees as $employee) : ?>
    <div class="employee-card">
        <div class="employee-info">
            <p><b><?php echo htmlspecialchars($employee['employeeName']); ?></b></p>
            <p>Age: <?php echo htmlspecialchars($employee['age']); ?></p>
            <p>Hire Date: <?php echo htmlspecialchars($employee['hireDate']); ?></p>
            <p>University: <?php echo htmlspecialchars($employee['uni']); ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</main>

<?php
require "layouts/footer.php"; 
?>