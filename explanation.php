<?php
include 'db.php';
class Explanation extends Dbcon
{
    function read()
    {
        $query = "SELECT exp FROM `questions`";
        $stmt = $this->connect()->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
}
$explanation = new Explanation();
$stmt = $explanation->read();
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
