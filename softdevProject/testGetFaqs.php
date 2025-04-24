<?php
require_once 'lib/database.php';
require_once 'lib/connect.php';
require_once 'lib/faq.php';

class FaqTest {
    private $faq;

    public function __construct() {
        $db = new database();
        $this->faq = new faq($db); 
    }

    public function testGetFaqs() {
        // Fetch all FAQs
        $faqs = $this->faq->getFaqs();

        // Assert that the result is an array
        assert(is_array($faqs), "Test failed: getFaqs should return an array.");

        // Optionally, check if there are FAQs in the result
        assert(count($faqs) > 0, "Test failed: There should be at least one FAQ.");

        echo "Test for getFaqs passed!";
    }
}

// Run the test
$test = new FaqTest();
$test->testGetFaqs();
?>
