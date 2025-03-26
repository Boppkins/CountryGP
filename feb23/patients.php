<!DOCTYPE html>
<html>
<head>
    <title>Patient Roster - County GP</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<?php require "layouts/header.php"; ?>

<!-- probably the most important page in terms of sql, similar to the staff roster but should be only accessible by staff (login)
 still unsure exactly how to do login, wasnt in symfony but would probably find tutorial-->

<!-- again, all info is hardcoded for the moment, will be injected with mySQL-->
    <main>
        <h2>Patient List</h2>
        <ul>
            <li>
                <h3>John Doe</h3>
                <p>Dob: Jan 15, 1985</p>
                <p>Prescription History: Medication A, Medication B</p>
                <p>Address: 123 Street St.</p>
                <p>Next of Kin: Jane Doe, Phone: 087-777-7777</p>
            </li>
            <li>
                <h3>John Doe</h3>
                <p>Dob: Jan 15, 1985</p>
                <p>Prescription History: Medication A, Medication B</p>
                <p>Address: 123 Street St.</p>
                <p>Next of Kin: Jane Doe, Phone: 087-777-7777</p>
            </li>
            <li>
                <h3>John Doe</h3>
                <p>Dob: Jan 15, 1985</p>
                <p>Prescription History: Medication A, Medication B</p>
                <p>Address: 123 Street St.</p>
                <p>Next of Kin: Jane Doe, Phone: 087-777-7777</p>
            </li>
            <li>
                <h3>John Doe</h3>
                <p>Dob: Jan 15, 1985</p>
                <p>Prescription History: Medication A, Medication B</p>
                <p>Address: 123 Street St.</p>
                <p>Next of Kin: Jane Doe, Phone: 087-777-7777</p>
            </li>
        </ul>
    </main>
    <?php require "layouts/footer.php"; ?>

</body>
</html>
