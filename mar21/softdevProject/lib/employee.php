<?php
require 'lib/connect.php';

class employee extends connect {

    public function getEmployees() {
        return $this->getAll('employee');
    }
}
?>
