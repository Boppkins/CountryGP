<?php
require 'lib/connect.php';  

class faq extends connect {

    public function getFaqs() {
        return $this->getAll('faq');  
    }
}
?>
