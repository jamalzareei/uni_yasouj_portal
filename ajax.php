<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo'
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        ';
if (!empty($_POST["uid_course"])) {
    $id=$_POST["uid_course"];
    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
    mysqli_set_charset($con, 'utf8');
    if (!mysqli_connect_error()) {
        $query = "select * from tbl_course where id='" . $id . "'";
        $table=  mysqli_query($con, $query);
        while ($rows = mysqli_fetch_assoc($table)) {
            $enrol=$rows['enrolment']+1;
            $up="UPDATE tbl_course SET enrolment='".$enrol."' Where id='" . $id . "'";
            mysqli_query($con, $up);
            $query_reg = "insert into tbl_course_register (uid_user,uid_course,course_name,course_mess,course_date,course_time,enrolment,mark,name_user,highly) values (N'" . $_SESSION['uid_user'] . "',N'" . $rows['uid_course'] . "',N'" . $rows['course_name'] . "',N'" . $rows['course_mess'] . "',N'" . $rows['course_date'] . "',N'" . $rows['course_time'] . "',N'" . $rows['enrolment'] . "',N'" . 0 . "',N'" . $_SESSION["username"] . "',N'" . 0 . "')";
            mysqli_query($con, $query_reg);
            //echo $rows['course_mess'];
        }
            mysqli_close($con);
    }
}
if (!empty($_POST["uid_del"]) && !empty($_POST["uid_course"])) {
    $id=$_POST["uid_del"];
    $uid_course_up=$_POST["uid_course"];
    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
    if (!mysqli_connect_error()) {
        $query_del = "delete from tbl_course_register where id='" . $id . "'";
        mysqli_query($con, $query_del);
        $query_up = "select * from tbl_course where uid_course='" . $uid_course_up . "'";
        $table_up=  mysqli_query($con, $query_up);
        while ($rows_up = mysqli_fetch_assoc($table_up)) {
            $enrol_up=$rows_up['enrolment']-1;
            $up="UPDATE tbl_course SET enrolment='".$enrol_up."' Where uid_course='" . $uid_course_up . "'";
            mysqli_query($con, $up);
            //$query_reg = "insert into tbl_course_register (uid_user,uid_course,course_name,course_mess,course_date,course_time,enrolment,mark) values (N'" . $_SESSION['uid_user'] . "',N'" . $_POST['uid_course'] . "',N'" . $rows['course_name'] . "',N'" . $rows['course_mess'] . "',N'" . $rows['course_date'] . "',N'" . $rows['course_time'] . "',N'" . $rows['enrolment'] . "',N'" . 0 . "')";
            //mysqli_query($con, $query_reg);
        }
            mysqli_close($con);
    }
}
if(!empty($_POST["id_course_reg"]) && !empty($_POST["mark"])){
    $id=$_POST["id_course_reg"];
    $mark=$_POST["mark"];
    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
    if (!mysqli_connect_error()) {
        $up_mark="UPDATE tbl_course_register SET mark='".$mark."' Where id='" . $id . "'";
        mysqli_query($con, $up_mark);
        mysqli_close($con);
    }
}
if(!empty($_POST["id_taeid"])){
    $id=$_POST["id_taeid"];
   // $mark=$_POST["mark"];
    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
    if (!mysqli_connect_error()) {
        $up_mark="UPDATE tbl_course_register SET highly='1' Where id='" . $id . "'";
        mysqli_query($con, $up_mark);
        mysqli_close($con);
        header("location: Admin_account.php?ac=taeid");
    }
}
?>
