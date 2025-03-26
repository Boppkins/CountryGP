<?php

function get_connection()
{
    $config = require 'config.php';

    try {
        $pdo = new PDO(
            $config['database_dsn'],
            $config['database_user'],
            $config['database_pass']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}

function get_employees()
{
    $pdo = get_connection();
    $stmt = $pdo->query('SELECT * FROM employee');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_faqs()
{
    $pdo = get_connection();
    $stmt = $pdo->query('SELECT * FROM faq');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function add_patients($name, $dob, $persc, $address, $emcon)
{
    $pdo = get_connection();
    
    $stmt = $pdo->prepare('INSERT INTO patient (name, dob, persc, address, emcon) VALUES (:name, :dob, :persc, :address, :emcon)');
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':persc', $persc);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':emcon', $emcon);
    
    $stmt->execute();
}

function update_patients($persc)
{
    $pdo = get_connection();
    
    $stmt = $pdo->prepare('UPDATE patient SET persc = :persc WHERE id = :id');
    
    $stmt->bindParam(':persc', $persc);
    
    $stmt->execute();
}

function get_patients()
{
    $pdo = get_connection();
    $stmt = $pdo->query('SELECT * FROM patient');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function delete_patient($id)
{
    $pdo = get_connection();

    $stmt = $pdo->prepare('DELETE FROM patient WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
}


?>
