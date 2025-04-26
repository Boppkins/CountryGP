<?php

//since database is required in basically everything outside lib
require_once 'lib/database.php';  

//this is what were sharing to outside the lib                        //CHANGE 
$database = new database('mysql:dbname=softwaredevdb;host=localhost;port=3377', 'root', null);
?>