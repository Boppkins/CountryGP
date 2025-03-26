<?php
require 'lib/database.php';
require 'lib/account.php';

//pulls connection from config
require 'lib/config.php';

$account = new account($database);
    //method to add a new account
    if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
        $accountModel = $account->addAccount($_POST['name'], $_POST['email'], $_POST['password']);
        header('Location: showregister.php');  
        exit;
    }
?>
