
<?php

class Conn
{
    protected $pdo;
  
    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=advent_memo_db", "root", "");
        } catch (Exception $e) {
            echo "Connection failed" . $e;
        }
    }
}

