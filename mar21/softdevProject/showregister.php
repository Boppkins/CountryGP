<?php
require 'lib/database.php';
require 'lib/account.php';

//pulls connection from config
require 'lib/config.php';

$accountModel = new account($database);
$accounts = $accountModel->getAccounts();

require "layouts/header.php";  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Register - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<main>
    <h2>Account List</h2>
    <?php foreach ($accounts as $account) : ?>
    <div class="patient-card">
        <div class="patient-info">
            <p>Full Name: <?php echo htmlspecialchars($account['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($account['email']); ?></p>
            <p>Password: <?php echo htmlspecialchars($account['password']); ?></p>
        </div>
    <?php endforeach; ?>

    <h2>Add Account</h2>
    <form method="post" action="register.php">
        <label for="name">Full Name: </label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email: </label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Passwor: </label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Confirm Account">
    </form>
</main>

</body>

<?php
require "layouts/footer.php"; 
?>
