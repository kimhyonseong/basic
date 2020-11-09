<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

class db
{
    public $conn = null;
    public $tmp_stmt = null;

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

            if ($this->check_id($id) != 0) {
                echo '<script>alert("이미 존재하는 아이디입니다."); history.back();</script>';
                exit();
            } else {

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
                return 1;
            }
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return 0;
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

    public function select_cnt($table,array $where_obj = null) {
        $query = 'select count(*) from '.$table;

    }

    public function select_query($table,array $where_obj = null){

        $query = 'select * from '.$table;
        //$obj = null;
        if (!is_null($where_obj)) {
            //var_dump($where_obj);
            $cnt = count($where_obj);
            $obj = array();

            foreach($where_obj as $key => $val) {
                $obj[] = $key.' = :'.$key.' and ';
            }

            $obj[$cnt-1] = str_replace('and ','',$obj[$cnt-1]);
            $where = ' where ';
            for ($i=0; $i<$cnt; $i++) {
                $where .= $obj[$i];
            }
            $query .= $where;
        }
        //echo $query;
        $stmt = $this->conn->prepare($query);
        $this->tmp_stmt = $stmt;

        if (isset($obj)) {
            foreach ($where_obj as $key => $val){
                $stmt->bindParam(':'.$key,$val);
            }
        }
        $stmt->execute();
    }

    public function fetch(){

        $result = array();

        if (!is_null($this->tmp_stmt)) {
            while ($row = $this->tmp_stmt->fetch(PDO::FETCH_ASSOC)) {
                $result = $row;
            }
            return $result;
        } else {
            return false;
        }
    }

}