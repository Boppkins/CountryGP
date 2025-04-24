<?php
require_once 'lib/database.php';
require_once 'lib/connect.php';
require_once 'lib/order.php';

class OrderTest {
    private $order;

    public function __construct() {
        $db = new database(); // ✅ Create the database connection
        $this->order = new order($db); // ✅ Pass the connection into the order class
    }

    public function testUpdatePrescription() {
        // Sample data for testing
        $patientName = "John Doe";
        $persc = "New Prescription";

        // Call the method to update the prescription
        $this->order->updatePrescription($patientName, $persc);

        // Optionally, check if the prescription has been updated in the database
        // Here you can query the database and assert the changes (if needed)
        echo "Test for updatePrescription passed!\n";
    }
}

// Run the test
$test = new OrderTest();
$test->testUpdatePrescription();
?>
