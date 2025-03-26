<!DOCTYPE html>
<html>
<head>
    <title>Staff Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php require 'lib/functions.php'; ?>
<?php require "layouts/header.php"; ?>

<main>
    <h2>Staff List</h2>
    <?php 
    $employees = get_employees();
    foreach ($employees as $employee) : ?>
    <div class="employee-card">
        <div class="employee-info">
            //name has to be split to first name and last name
            <p><b><?php echo htmlspecialchars($employee['name']); ?></b></p>
            <p>Age: <?php echo htmlspecialchars($employee['age']); ?></p>
            <p>Hire Date: <?php echo htmlspecialchars($employee['hireDate']); ?></p>
            <p>University: <?php echo htmlspecialchars($employee['uni']); ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</main>
    <?php require "layouts/footer.php"; ?>

</body>
</html>
