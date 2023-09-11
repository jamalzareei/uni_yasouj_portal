<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author sma
 */
class DB {
    //put your code here
    private $server;
    private $user;
    private $pass;
    private $dbname;
    private $connection;
    private $result;
    
    function connetion($server,$user,$pass,$dbname){
        $this->server=$server;
        $this->user=$user;
        $this->pass=$pass;
        $this->dbname=$dbname;
        $this->connection=@mysqli_connect($server, $user, $pass, $dbname);
        mysqli_set_charset($this->connection, 'utf8');
    }
    function query($query){
        $this->result=  mysqli_query($this->connection, $query);
        return $this->result;
    }
    function close(){
        mysqli_close($this->connection);
    }
    
}

?>
