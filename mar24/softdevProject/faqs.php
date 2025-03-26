<?php
require 'lib/database.php';
require 'lib/faq.php';

//pulls connection from config
require 'lib/config.php';

//and defines faq then pulls method from lib/faq
$faq = new faq($database);
$faqs = $faq->getFaqs();

require "layouts/header.php";  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Roster - Country GP</title>
    <link rel="stylesheet" href="css.css"> 
</head>
<body>

<main>
    <h2>FAQs</h2>
    <?php foreach ($faqs as $faq) : ?>
    <div class="faq-card">
        <div class="faq-info">
            <p><b>Question:</b> <?php echo htmlspecialchars($faq['q']); ?></p>
            <p><b>Answer:</b> <?php echo htmlspecialchars($faq['a']); ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</main>

<?php
require "layouts/footer.php"; 
?>
