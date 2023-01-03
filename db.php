<?php

class Dbcon
{
    public function connect()
    {
        try {

            $username = 'root';
            $password = '';
            $db       = new PDO('mysql:host=localhost;dbname=aws', $username, $password);
            return $db;
        } catch (PDOException $e) {
            print $e->getMessage();
            die();
        }
    }
}
