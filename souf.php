<?php
include_once 'db.php';
// instantiate database and product object
class user extends Dbcon
{
    // read products
    function read()
    {
        // select all query
        $query = "SELECT q.title, 
        MAX(CASE WHEN r.id = (q.id*4)-3 THEN r.answer END) AS answer_1, 
        MAX(CASE WHEN r.id = (q.id*4)-2 THEN r.answer END) AS answer_2, 
        MAX(CASE WHEN r.id = (q.id*4)-1 THEN r.answer END) AS answer_3, 
        MAX(CASE WHEN r.id = (q.id*4) THEN r.answer END) AS answer_4 
        FROM questions q 
        JOIN responses r ON q.id = r.question_id 
        GROUP BY q.id";
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

// print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
// echo '<pre>';
// print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
// echo '</pre>';
