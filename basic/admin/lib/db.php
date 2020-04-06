<?php
//include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

class db
{
    public $conn = null;
    public $DB1;

    public function __construct($DB1 = array())
    {
        try {
            $pdo = new PDO('mysql:host=' . $DB1['Host'] . 'dbname=' . $DB1['dbName'], $DB1['dbUser'], $DB1['dbPass']);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->conn = $pdo;
            var_dump($DB1['Host']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert_user($id,$pw,$name,$birth){

        try {
            $dbi = $this->conn;
            //var_dump($dbi);

            $param = array(
                ':id' => $id,
                ':pw' => $pw,
                ':name' => $name,
                ':birth' => $birth
            );
            $query = 'insert into user(id,pw,name,birth)
                  values(":id",":pw",":name",":birth")';

//            $stmt = $dbi->prepare($query);
//
//            foreach ($param as $key => $val) {
//                $stmt->bindParam($key, $val);
//            }
//            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}