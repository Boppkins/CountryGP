<?php
require_once 'lib/database.php';
require_once 'lib/connect.php';
require_once 'lib/meds.php';

class MedsTest {
    private $meds;

    public function __construct() {
        $db = new database(); 
        $this->meds = new meds($db);
    }

    public function testGetMedications() {
        // Fetch all medications
        $medications = $this->meds->getMedications();

        // Assert that the result is an array
        assert(is_array($medications), "Test failed: getMedications should return an array.");

        // Optionally, check if there are medications in the result
        assert(count($medications) > 0, "Test failed: There should be at least one medication.");

        echo "Test for getMedications passed!";
    }
}

// Run the test
$test = new MedsTest();
$test->testGetMedications();
?>
