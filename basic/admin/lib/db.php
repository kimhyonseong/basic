<?php
include_once $_SERVER['DOCUMENT_ROOT'].'config.php';

class db
{
    public $conn = null;

    public function __construct()
    {
        $pdo = new PDO('mysql:host='.$DB1['Host'].'dbname='.$DB1['dbName'],$DB1['dbUser'],$DB1['dbPass']);
        $this->conn = $pdo;
    }

}