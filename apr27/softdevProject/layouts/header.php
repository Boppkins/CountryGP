<header>
    <img src="gpLogo.png" alt="Doctor's Office Logo" class="header-image">
    
    <h1>Welcome to Our Doctor's Office</h1>
    <nav>
        <a href="/index.php">Home</a>
        <a href="/staff.php">Staff Roster</a>
        <a href="/faqs.php">FAQs</a>
        <a href="/order.php">Order Prescriptions</a>
        <a href="/help.php">Help</a>
        <a href="/login.php">Login</a>
        <a href="/register.php">Register</a>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'staff'): ?>
            <a href="/showpatients.php">STAFF Patient Roster</a>
            <a href="/showregister.php">STAFF Account Roster</a>
        <?php endif; ?>
    </nav>
</header>
