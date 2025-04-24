<?php                                                   //WON'T WORK FOR YOUS
class database {                                        //get rid of this port thing to get it to work for you, 3377 is my port yours is default
    private $dsn = 'mysql:dbname=softwaredevdb;host=localhost;port=3377'; 
    private $username = 'root'; 
    private $password = '';
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

?>