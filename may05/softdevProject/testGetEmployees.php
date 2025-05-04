<?php
require_once 'lib/database.php';
require_once 'lib/connect.php';
require_once 'lib/employee.php';

class EmployeeTest {
    private $employee;

    public function __construct() {
        $db = new database(); 
        $this->employee = new employee($db);
    }

    public function testGetEmployees() {
        $employees = $this->employee->getEmployees();

        assert(count($employees) > 0, "Test failed: Minimum number of employees required.");

        echo "Test for getEmployees passed!";
    }
}

$test = new EmployeeTest();
$test->testGetEmployees();
?>
