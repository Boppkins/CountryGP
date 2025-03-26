<?php
require 'lib/database.php';
require 'lib/account.php';
require 'lib/config.php';

$account = new account($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $user = $account->login($_POST['email'], $_POST['password']);
        if ($user) {
            // Start the session and store user data in session
            session_start();
            $_SESSION['user'] = $user;
            header('Location: appointments.php'); // Redirect to appointments page
            exit;
        } else {
            $error = "Invalid credentials!";
        }
    }
}
?>

<?php require "layouts/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>

    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</body>
</html>
