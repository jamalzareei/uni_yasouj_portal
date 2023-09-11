<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_spec
 * user specification
 * @author sma
 */
class user_spec {

    const db_server = "localhost";
    const db_name = "db_uni_portal";
    const db_user = "root";
    const db_password = "";

    private $db = null;
    public $name_user = null;
    public $uid_user = null;
    public $father_name = null;
    public $ip = null;
    public $diploma = null;
    public $study = null;
    public $date_start = null;
    public $employee = null;
    public $employ_type = null;
    public $tell = null;
    public $password = null;
    public $safe = null;
    public $sex = null;

    public function user_spec($name_user, $uid_user, $password) {
        //PDO Database Connection
        $dsn = 'mysql:dbname=' . self::db_name . ';host=' . self::db_server;
        //Try-Catch Block
        try {
            $this->db = new PDO($dsn, self::db_user, self::db_password,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->name_user = $name_user;
            $this->uid_user = $uid_user;
            $this->password = $password;
            $this->getUserSpec($name_user, $uid_user, $password);
        } catch (PDOException $e) {
            echo 'Connection Failed: ' . $e->getMessage();
        }
    }

    public function getUserSpec($name_user, $uid_user, $password) {
        if ($uid_user == null) {
            return FALSE;
        }
        $statment = $this->db->prepare("select * from tbl_register where name_user='$name_user' and uid_user='$uid_user' and password='$password'");
        $statment->execute();
        if ($statment->rowCount() > 0) {
            $row = $statment->fetch();
            if ($row != null) {
                $this->name_user = $row['name_user'];
                $this->father_name = $row['father_name'];
                $this->ip = $row['ip'];
                $this->diploma = $row['diploma'];
                $this->study = $row['study'];
                $this->date_start = $row['date_start'];
                $this->employee = $row['employee'];
                $this->employ_date = $row['employ_date'];
                $this->tell = $row['tell'];
                //$this->password=$row['password'];
                $this->safe = $row['safe'];
                $this->sex = $row['sex'];
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
        $statment = NULL;
        return TRUE;
    }

}

$user = new user_spec();
?>
