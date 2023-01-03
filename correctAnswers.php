<?php
include_once 'db.php';

class CorrectAnswers extends Dbcon
{
    function read()
    {
        $query = "SELECT answer FROM responses WHERE responses.iscorrect = 1";
        $stmt = $this->connect()->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
}
$answers = new CorrectAnswers();
$stmt = $answers->read();
// $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
