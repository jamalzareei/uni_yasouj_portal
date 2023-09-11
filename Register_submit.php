<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//include 'Con_db.php';
$UserSecCode = strtolower($_POST['security']);
$SysSecCopde = strtolower($_SESSION['SecImageStr']);
if ($UserSecCode != $SysSecCopde) {
    header("location:Register.php?action=error_ceurity");
} else {
    if (!empty($_POST["name_user"]) && !empty($_POST["code_meli"]) &&
            !empty($_POST["father_name"]) && !empty($_POST["madrak"]) &&
            !empty($_POST["reshte"]) && !empty($_POST["post_s"]) &&
            !empty($_POST["employ_type"]) && !empty($_POST["tell"]) &&
            !empty($_POST["serial_number"]) && !empty($_POST["sadere"])) {
        $name_user1 = $_POST["name_user"];
        $uid_user1 = $_POST["code_meli"];
        $father_name1 = $_POST["father_name"];
        $ip1 = "";//$_SERVER['REMOTE_ADDR'];
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip1 = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip1 = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip1 = $_SERVER["REMOTE_ADDR"];
        }
        $diploma1 = $_POST["madrak"];
        $study1 = $_POST["reshte"];
        $date_start1 = date("Y-m-d");
        $employee1 = $_POST["post_s"];
        $employ_type1 = $_POST["employ_type"];
        $tell1 = $_POST["tell"];
        $password1 = md5($_POST["serial_number"]);
        $safe1 = 2;
        $sex1 = $_POST["sex"];
        $serial_number1=$_POST["serial_number"];
        $emission1=$_POST["sadere"];
//$successfull == TRUE;
// $successfull == FALSE;
///Write SQL codes here
        $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
        mysqli_set_charset($con, 'utf8');
        if (!mysqli_connect_error()) {
            $query = "select * from tbl_register where uid_user='$uid_user1' or serial_number='$serial_number1'";
            $res_user = mysqli_query($con, $query);

            if (mysqli_num_rows($res_user) == 0) {
                $query_reg = "insert into tbl_register (name_user,uid_user,father_name,ip,diploma,study,date_start,employee,employ_type,tell,password,safe,sex,serial_number,emission)
                    values (N'" . $name_user1 . "','" . $uid_user1 . "',N'" . $father_name1 . "',N'" . $ip1 . "',N'" . $diploma1 . "',N'" . $study1 . "',N'" . $date_start1 . "',N'" . $employee1 . "',N'" . $employ_type1 . "','" . $tell1 . "',N'" . $password1 . "',N'" . $safe1 . "',N'" . $sex1 . "',N'" . $serial_number1 . "',N'" . $emission1 . "')";

                mysqli_query($con, $query_reg);
                mysqli_close($con);
                $_SESSION["username"] = $name_user1;
                $_SESSION["uid_user"] = $uid_user1;
                $_SESSION["safe"] =2;
                header("location: User_Account.php?model=Archive");
            } else if (mysqli_num_rows($res_user) >= 1) {
                header("location: Register.php?user=error");
            }
        } else {
            header("location: Register.php?user=error");
        }
    } else {
        header("location: Register.php?text=error");
    }
    //echo 'error1';
}
?>
