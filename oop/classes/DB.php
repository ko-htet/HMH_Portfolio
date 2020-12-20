<?php
    class DB{
        private static $dbh = null;
        private static $res, $sql, $data, $count;

        public function __construct(){
            self::$dbh = new PDO("mysql:host=localhost;dbname=portfolio_db", "root", "");
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        public function query($params = []){
            self::$res = self::$dbh->prepare(self::$sql);
            self::$res->execute($params);
            return $this;
        }
        public function get(){
            self::$data = self::$res->fetchall(PDO::FETCH_OBJ);
            return self::$data;
        }
        public function getOne(){
            self::$data = self::$res->fetch(PDO::FETCH_OBJ);
            return self::$data;
        }
        public function count(){
            self::$count = self::$res->rowCount();
            return self::$count;
        }
        public static function table($table){
            $sql = "select * from $table";
            self::$sql = $sql;
            $db = new DB();
            $db->query();
            return $db;
        }
        public function orderBy($col, $value){
            self::$sql .= " order by $col $value";
            $this->query();
            return $this;
        }
        public function where($col, $operator, $value=""){
            if(func_num_args() == 2){
                self::$sql .= " where $col = '$operator'";
            }else{
                self::$sql .= " where $col $operator '$value'";
            }
            $this->query();
            return $this;
        }
        public function andwhere($col, $operator, $value=""){
            if(func_num_args() == 2){
                self::$sql .= " and $col = '$operator'";
            }else{
                self::$sql .= " and $col $operator '$value'";
            }
            $this->query();
            return $this;
        }
        public function orwhere($col, $operator, $value=""){
            if(func_num_args() == 2){
                self::$sql .= " or $col = '$operator'";
            }else{
                self::$sql .= " or $col $operator '$value'";
            }
            $this->query();
            return $this;
        }
        public static function create($table, $data){
            $db = new DB();
            $data_key = implode(',', array_keys($data));
            $v = '';
            $i = 1;
            foreach($data as $d){
                $v .= '?';
                if($i < count($data)){
                    $v .= ', ';
                    $i++;
                }
            }
            $sql = "insert into $table ($data_key) values ($v)";
            self::$sql = $sql;
            $values = array_values($data);
            $db->query($values);
            $id = self::$dbh->lastInsertId();
            return DB::table($table)->where('id', $id)->getOne();
        }
        public static function update($table, $data, $id){
            $db = new DB();
            $sql = "update $table set ";
            $va = '';
            $i = 1;
            foreach($data as $k => $v){
                $va .= "$k = ?";
                if($i < count($data)){
                    $va .= ', ';
                    $i++;
                }
            }
            $sql .= "$va where id = $id";
            self::$sql = $sql;
            $values = array_values($data);
            return DB::table($table)->where('id', $id)->getOne();
        }
        public static function delete($table, $id){
            $db = new DB();
            $sql = "delete from $table where id = $id";
            self::$sql = $sql;
            $db->query();
            return true;
        }
        public static function raw($sql){
            $db = new DB();
            self::$sql = $sql;
            $db->query();
            return $db;
        }
        public function paginate($record_per_page){
            if(isset($_GET['page'])){
                $page_no = $_GET['page'];
            }
            if(!isset($_GET['page']) || $_GET['page']<1){
                $page_no = 1;
            }
            $this->query();
            $total = self::$count = self::$res->rowCount();
            $p = ($page_no - 1) * $record_per_page;
            self::$sql .= " limit $p, $record_per_page";
            $this->query();
            self::$data = self::$res->fetchall(PDO::FETCH_OBJ);
            $pre_no = $page_no - 1;
            $next_no = $page_no + 1;
            $pre_page = "?page=$pre_no";
            $next_page = "?page=$next_no";
            $data = [
                'data' => self::$data,
                'total_projects' => $total,
                'pre_page' => $pre_page,
                'next_page' => $next_page
            ];
            return $data;
        }
    }
?>