<?php
class connect {
    protected $db;

    // constructor to init database connection
    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    // method to fetch all from a table
    public function getAll($table) {
        $stmt = $this->db->query("SELECT * FROM $table");
        // return the fetched records as asso array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // method to insert data into a table
    public function insert($table, $data) {
        $fields = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        
        // prep the sql query for insertion
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);
        
        // bind values 
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        // runs statement and sees if it works
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
}
?>
