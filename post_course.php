<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post_course
 *
 * @author sma
 */
class post_course {
    //put your code here
    const db_server = "localhost";
    const db_name = "db_uni_portal";
    const db_user = "root";
    const db_password = "";

    private $db = null;
   

    public function post_course() {
        //PDO Database Connection
        $dsn = 'mysql:dbname=' . self::db_name . ';host=' . self::db_server;
        //Try-Catch Block
        try {
            $this->db = new PDO($dsn, self::db_user, self::db_password,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
         
        } catch (PDOException $e) {
            echo 'Connection Failed: ' . $e->getMessage();
        }
    }
    public function insert_user($name_user, $uid_user, $father_name, $ip, $diploma, $study, $date_start, $employee, $employ_type, $tell, $password, $safe,$sex) {
        $query_reg = "insert into tbl_register (name_user,uid_user,father_name,ip,diploma,study,date_start,employee,employ_type,tell,password,safe,sex) values (N'" . $name_user1 . "','" . $uid_user1 . "',N'" . $father_name1 . "',N'" . $ip1 . "',N'" . $diploma1 . "',N'" . $study1 . "',N'" . $date_start1 . "',N'" . $employee1 . "',N'" . $employ_type1 . "','" . $tell1 . "',N'" . $password1 . "',N'" . $safe1 . "',N'" . $sex1 . "')";

        $insert_reg = $this->db->prepare($query_reg);
        return $insert_reg->execute();
    }
    public function insert_archive($archive_title,$archive_date,$archive_message,$archive_link,$num_visit){
        $query_etlae = "insert into tbl_archive (archive_title,archive_message,archive_date,archive_link,num_visit) values (N'" . $archive_title . "',N'" . $archive_message . "',N'" . $archive_date . "',N'" . $archive_link . "',N'" . $num_visit . "')";
        $insert_etlae = $this->db->prepare($query_etlae);
        return $insert_etlae->execute();
    }
    
    public function insert_coure($uid_course,$course_name,$course_mess, $course_date,$course_time , $enrolment){
        $query_course = "insert into tbl_course (uid_course,course_name,course_mess,course_date,course_time,enrolment) 
            values (N'" . $uid_course . "',N'" . $course_name . "',N'" . $course_mess . "',N'" . $course_date . "',N'" . $course_time . "',N'" . $enrolment . "')";
        $insert_course=  $this->db->prepare($query_course);
        return $insert_course->execute();
    }
    public function insert_course_reg($uid_user,$uid_course,$course_name,$course_mess , $course_date ,$course_time , $enrolment, $mark , $username){
        $query_course_reg = "insert into tbl_course_register (uid_user,uid_course,course_name,course_mess,course_date,course_time,enrolment,mark,name_user)
            values (N'" . $uid_user . "',N'" . $uid_course . "',N'" . $course_name . "',N'" . $course_mess . "',N'" . $course_date . "',N'" . $course_time . "',N'" . $enrolment . "',N'" . $mark . "',N'" . $username . "')";
        $insert_course_Reg=  $this->db->prepare($query_course_reg);
        return $insert_course_Reg->execute();
    }
    
    public function insert_relate($sender_name,$sender_mail,$message){
         $query_relate = "insert into tbl_relate (sender_name,sender_mail,message) values (N'" . $sender_name . "',N'" . $sender_mail . "',N'" . $message . "')";
        $insert_relat=  $this->db->prepare($query_relate);
        return $insert_relat->execute();
    }
    
    public function course(){
        $query_course=$this->db->prepare("select * from tbl_course order by ID DESC");
        $query_course->execute();
        if($query_course->rowCount()>0){
            return $query_course->fetchAll();
        }
        return FALSE;
    }
    public function course_id($id){
        $query_course=$this->db->prepare("select * from tbl_course WHERE id='$id' order by ID DESC");
        $query_course->execute();
        if($query_course->rowCount()>0){
            return $query_course->fetchAll();
        }
        return FALSE;
    }
    public function course_reg_tek($uid_user,$uid_course){
        $query_course=$this->db->prepare("select * from tbl_course_register WHERE uid_course='$uid_course' and uid_user='$uid_user' order by ID DESC");
        $query_course->execute();
        if($query_course->rowCount()>0){
            return $query_course->fetchAll();
        }
        return FALSE;
    }
    
    public function course_reg($uid_user){
        $query_course_reg=$this->db->prepare("select * from tbl_course_register where uid_user='$uid_user' order by ID DESC");
        $query_course_reg->execute();
        if($query_course_reg->rowCount()>0){
            return $query_course_reg->fetchAll();
        }
        return FALSE;
    }
    public function course_reg_search($searcher){
        $query_course_reg=$this->db->prepare("select * from tbl_course_register where name_user like '%$searcher%' or uid_user like '%$searcher%' order by ID DESC");
        $query_course_reg->execute();
        if($query_course_reg->rowCount()>0){
            return $query_course_reg->fetchAll();
        }
        return FALSE;
    }
    public function course_reg_user($uid_user){
        $query_course_reg=$this->db->prepare("select * from tbl_course_register where uid_user='$uid_user' and highly='1' order by ID DESC");
        $query_course_reg->execute();
        if($query_course_reg->rowCount()>0){
            return $query_course_reg->fetchAll();
        }
        return FALSE;
    }
    public function course_reg_admin(){
        $query_course_reg=$this->db->prepare("select * from tbl_course_register where highly='0' order by ID DESC");
        $query_course_reg->execute();
        if($query_course_reg->rowCount()>0){
            return $query_course_reg->fetchAll();
        }
        return FALSE;
    }
    
    public function course_reg_mark($mark){
        $query_course_reg=$this->db->prepare("select * from tbl_course_register where uid_course='$mark' order by ID DESC");
        $query_course_reg->execute();
        if($query_course_reg->rowCount()>0){
            return $query_course_reg->fetchAll();
        }
        return FALSE;
    }
    
    public function relate(){
        $query_etla=$this->db->prepare("select * from tbl_relate order by ID DESC");
        $query_etla->execute();
        if($query_etla->rowCount()>0){
            return $query_etla->fetchAll();
        }
        return FALSE;
    }
    public function archive(){
        $query_archive=$this->db->prepare("select * from tbl_archive order by ID DESC");
        $query_archive->execute();
        if($query_archive->rowCount()>0){
            return $query_archive->fetchAll();
        }
        return FALSE;
    }
    public function login($code_meli,$password){
        $query_login=$this->db->prepare("select * from tbl_register where uid_user='$code_meli' and password='$password'");
        $query_login->execute();
        if($query_login->rowCount()>0){
            return $query_login->fetchAll();
        }
        return FALSE;
    }
    public function archive_id($id){
        $query_archive=$this->db->prepare("select * from tbl_archive WHERE id='$id' order by ID DESC");
        $query_archive->execute();
        if($query_archive->rowCount()>0){
            return $query_archive->fetchAll();
        }
        return FALSE;
    }
    public function update_course($enrol,$id){
        $up="UPDATE tbl_course SET enrolment='".$enrol."' Where id='" . $id . "'";
           $update=  $this->db->prepare($up);
           return $update->execute();
    }
    public function update_archive($num,$id_archive){
        $up_archive="UPDATE tbl_archive SET num_visit='".$num."' Where id='" . $id_archive . "'";
           $update_archive=  $this->db->prepare($up_archive);
           return $update_archive->execute();
    }
    public function del_course_reg($id){
        $del="delete from tbl_course_register where id='" . $id . "'";
           $del_cor_reg=  $this->db->prepare($del);
        return $del_cor_reg->execute();
    }
    
}
$postcourse=new post_course();
?>
