<?php

class Database
{
    public $conn;
    public function connect() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'clothing_shop');
        return $this->conn;
    }

    public function __construct() {
        $this->connect();
    }
}
