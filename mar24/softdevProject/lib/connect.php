<?php
class connect {
    protected $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    // Method to fetch all records from a table
    public function getAll($table) {
        $stmt = $this->db->query("SELECT * FROM $table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// Assuming the 'insert' method looks something like this:
public function insert($table, $data) {
    // Prepare the field names and values for the SQL statement
    $fields = implode(", ", array_keys($data));
    $placeholders = ":" . implode(", :", array_keys($data));
    
    // Prepare the SQL query
    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    
    // Prepare and execute the statement
    $stmt = $this->db->prepare($sql);
    
    // Bind values to the placeholders
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    
    // Execute the statement
    if ($stmt->execute()) {
        return $this->db->lastInsertId();  // Return the ID of the last inserted record
    } else {
        return false;  // Return false if insertion fails
    }
}

}
?>
