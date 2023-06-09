<?php

class Database
{
    public $db;

    public function __construct()
    {
        try{
            $this->db = new PDO
            (
                'mysql:host=127.0.0.1;dbname=lokeshcalculator',
                'root',
                'password'
            );
        }
        catch(Exception $e){
            die("connection error");
        }
    }

    public function query($query)
    {
        $statement = $this->db->prepare($query);
        $statement->execute($statement);

        return $statement;
    }
}

