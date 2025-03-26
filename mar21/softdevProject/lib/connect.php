<?php

class connect {
    protected $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }
                    //inheritence child classes oull this method
    public function getAll($table) {
        $stmt = $this->db->query("SELECT * FROM $table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
