<?php
require_once 'lib/database.php';
require_once 'lib/connect.php';
require_once 'lib/account.php';

class AccountTest {
    private $account;

    public function __construct() {
        $db = new database(); 
        $this->account = new account($db);
    }

    public function testAddAccount() {
        $name = "Mark Hopkins";
        $email = "MHopkins@email.com";
        $password = "password123";

        //checks attributes
        if (empty($name) || empty($email) || empty($password)) {
            echo "Test failed: Missing required input (name, email, or password).<br>";
            return;
        }

        $accountId = $this->account->addAccount($name, $email, $password);

        assert(is_numeric($accountId), "Test failed: Account ID should be a number.");
        echo "Test for addAccount passed!";
    }
}

$test = new AccountTest();
$test->testAddAccount();
?>
