<?php
include_once('../config.php');


class database {
   
    protected  $db_conn;
    public $db_name = DB_NAME;
    public $db_host = DB_HOST;
    public $db_user = DB_USER;
    public  $db_pass = DB_PASS;
    
    function  connect() {
        try {
            $this-> db_conn = new PDO("mysql:host = $this ->db_host, dbname = $this->db_name, $passwd=$this->db_pass, $options");
            return $this -> db_conn;
    } catch (PDOException $e) {
        return $e -> getMessage;
    }
    }
    
}

?>
