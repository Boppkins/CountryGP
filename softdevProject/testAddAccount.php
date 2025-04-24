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

    // will add to database so dont spam
    // not on navbar anywhere, have to manually input the tests in url
    public function testAddAccount() {
        $name = "John Doe";
        $email = "john.doe@example.com";
        $password = "password123";

        $accountId = $this->account->addAccount($name, $email, $password);

        assert(is_numeric($accountId), "Test failed: Account ID should be a number.");

        echo "Test for addAccount passed!";
    }
}

$test = new AccountTest();
$test->testAddAccount();
?>
