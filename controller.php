<?php
include_once 'db.php';

class Answers extends Dbcon
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

$answers = new Answers();
$stmt = $answers->read();
// $stmt->fetchAll(PDO::FETCH_ASSOC);
$new_array = [];




foreach ($stmt  as $key => $value) {
    array_push($new_array, $value['answer']);
    // echo $value['answer'];
}
// echo '<pre>';
// print_r($new_array);
// echo '</pre>';



// echo $new_array[0];





$array = $_GET['data'];
$array1 = json_decode($array);
// echo $array1[0];
$s = 0;

for ($i = 0; $i < count($new_array); $i++) {
    # code...
    if ($array1[$i] == $new_array[$i]) {
        # code...
        $s++;
    }
}
echo $s;
