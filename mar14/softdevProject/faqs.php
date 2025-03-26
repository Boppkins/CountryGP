<!DOCTYPE html>
<html>
<head>
    <title>FAQs - CountryGP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php require 'lib/functions.php'; ?>
<?php require "layouts/header.php"; ?>

<main>
    <h2>FAQs</h2>
    <?php 
    $faqs = get_faqs();
    foreach ($faqs as $faq) : ?>
        <p><b><?php echo htmlspecialchars($faq['q']); ?></b></p>
        <p><?php echo htmlspecialchars($faq['a']); ?></p>
    <?php endforeach; ?>
    </main>
    <?php require "layouts/footer.php"; ?>
</body>
</html>
