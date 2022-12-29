<?php
include_once 'db.php';
// instantiate database and product object
class user extends Dbcon
{
    // read products
    function read()
    {
        // select all query
        $query = "SELECT * FROM qst";
        // prepare query statement
        $stmt = $this->connect()->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
}

// instantiate new user object
$user = new user();
// query users
$stmt = $user->read();
// turn to JSON format
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
