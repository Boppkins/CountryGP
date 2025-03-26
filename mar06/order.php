<!DOCTYPE html>
<html>
<head>
    <title>Order Prescriptions - Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php require "layouts/header.php"; ?>

    <main>
        <!-- placeholder form for now, will do something similar to tthe symfonycasts form for pets
         thos doesnt work at all just general idea of what form will/should look like-->
        <h2>Order Prescription</h2>
        <form method="post" action="order.php">
            <label for="name">Full Name:</label><br>
            <input type="text" id="name" name="name"><br><br>

            <label for="dob">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob"><br><br>

            <label for="medication">Medication Name:</label><br>
            <input type="text" id="medication" name="medication"><br><br>

            <label for="quantity">Quantity:</label><br>
            <input type="number" id="quantity" name="quantity"><br><br>

            <input type="submit" value="Submit Request">
        </form>
        <?php
        ?>
    </main>
    <?php require "layouts/footer.php"; ?>

</body>
</html>
