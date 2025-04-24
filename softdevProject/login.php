<?php
require 'lib/database.php';
require 'lib/account.php';
require 'lib/config.php';

session_start(); // Always start the session before any HTML

$account = new account($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'], $_POST['password'])) {
        $user = $account->login($_POST['email'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = $user; // Save user data in session
            header('Location: login.php'); // Redirect to refresh the page
            exit;
        } else {
            $error = "No no no tututu";
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

<?php if (isset($_SESSION['user'])): ?>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!, You can now order a prescription!</h2>
    <p><a href="logout.php">Logout</a></p>
<?php else: ?>
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
<?php endif; ?>

</body>
</html>
