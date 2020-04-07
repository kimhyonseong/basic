<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

class db
{
    public $conn = null;

    public function __construct()
    {
        global $DB;

        try {
            $pdo = new PDO('mysql:host=' . $DB['Host'] . ';dbname=' . $DB['dbName'], $DB['dbUser'], $DB['dbPass']);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->conn = $pdo;
            //var_dump($DB['Host']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function insert_user($id,$pw,$name,$birth){

        try {
            $dbi = $this->conn;
            //var_dump($this->conn);

            $param = array(
                ':id' => $id,
                ':pw' => $pw,
                ':name' => $name,
                ':birth' => $birth
            );
            $query = 'insert into user(id,pw,name,birth)
                  values(:id,:pw,:name,:birth)';

            $stmt = $dbi->prepare($query);

            foreach ($param as $key => &$val) {    // &를 붙여 참조전달
                $stmt->bindParam($key, $val);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function check_id($id) {

        try {
            $dbi = $this->conn;

            $query = 'select id from user where id= :id';
            $stmt = $dbi->prepare($query);
            $stmt->bindParam(':id',$id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //$row_num = $stmt->rowCount(); // mysql에서 실행 안됨
            if (strlen($row['id']) > 0) {
                return 1;   //아이디 있음
            } else {
                return 0;   //아이디 없음
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function login($id,$pw){

    }

}