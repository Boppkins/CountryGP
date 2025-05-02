<?php
require_once 'lib/database.php';
require_once 'lib/connect.php';
require_once 'lib/order.php';

class OrderTest {
    private $order;

    public function __construct() {
        $db = new database(); 
        $this->order = new order($db); 
    }

    public function testUpdatePrescription() {
        //sample data for testing
        $patientName = "Mark Hopkins";
        $persc = "None";

        //updates the prescription
        $this->order->updatePrescription($patientName, $persc);

        echo "Test for updatePrescription passed!";
    }
}

$test = new OrderTest();
$test->testUpdatePrescription();
?>
