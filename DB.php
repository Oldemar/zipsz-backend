<?php

class DB
{
    public $database;
    public $results = [];


    function __construct($database) {
        $this->database = $database;
    }

    private function connect($database){
        $conn = new mysqli(
            $database['server'],
            $database['username'],
            $database['password'],
            $database['db']
        );

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }

    function Select($Table,$Fields = array(),$Limit = null) {
        $conn = $this->connect($this->database);
        $fields = null;
        foreach ($Fields as $field) {
            $fields .=  $field.',';
        }
        $fields = rtrim($fields,',');
        $result = $conn->query("SELECT $fields FROM $Table ");
        if ($result->num_rows > 0) {
            $this->results($result);
            return true;
        }
        return false;
    }

    public function Query($query){
        $conn = $this->connect($this->database);
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $this->results($result);
            return true;
        }
        return false;
   }
    function results($result){
        while($row = $result->fetch_assoc()) {
            $this->results[] = $row;
        }
    }


}
