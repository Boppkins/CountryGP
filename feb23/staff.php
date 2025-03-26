<!DOCTYPE html>
<html>
<head>
    <title>Staff Country GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

<?php require "layouts/header.php"; ?>

    <main>
        <!-- staff roster is hard coded for now until json / mySQL is injected
         might do add and delete buttons for staff-->
        <h2>Staff List</h2>
        <ul>
            <!-- pull images from database of headshots of doctors, similar to airpups images-->
            <li>
                <h3>Dr. Sarah Thompson</h3>
                <p>General Practitioner.</p>
            </li>
            <li>
                <h3>Dr. Sarah Thompson</h3>
                <p>General Practitioner.</p>
            </li>
            <li>
                <h3>Dr. Sarah Thompson</h3>
                <p>General Practitioner.</p>
            </li>
            <li>
                <h3>Dr. Sarah Thompson</h3>
                <p>General Practitioner.</p>
            </li>
        </ul>
    </main>
    <?php require "layouts/footer.php"; ?>

</body>
</html>
