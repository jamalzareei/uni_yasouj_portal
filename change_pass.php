<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$uid_user = $_SESSION["uid_user"];
$old_pass = md5($_POST["ol_pass"]);
$new_pass = md5($_POST["new_pass"]);
$re_new_pass = md5($_POST["re_new_pass"]);
if (!empty($_POST["ol_pass"]) && !empty($_POST["new_pass"]) && !empty($_POST["re_new_pass"])) {


    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
    mysqli_set_charset($con, 'utf8');
    mysqli_set_charset($con, 'SET character_set_results=utf8,character_set_client=utf8,character_set_connection=utf8,character_set_database=utf8,character_set_server=utf8');
    if (!mysqli_connect_error()) {
        //$query = "select * from tbl_register where uid_user='$uid_user' and password='$old_pass'";

        $res_user = mysqli_query($con, "select * from tbl_register where uid_user='" . $uid_user . "' and password='" . $old_pass . "'");

        // while ($rows_user = mysqli_fetch_assoc($res_user)) {
        if (mysqli_num_rows($res_user) == 1) {
            if ($new_pass == $re_new_pass) {
                $up_pass = "UPDATE tbl_register SET password=N'" . $new_pass . "' Where uid_user=N'" . $uid_user . "'";
                mysqli_query($con, $up_pass);
                header("location: User_Account.php?model=Change_pass&&change_pass=success");
            } else {
                header("location: User_Account.php?model=Change_pass&&error=not_set_passwords");
            }
        } else {
            header("location: User_Account.php?model=Change_pass&&error=pass_old_false&pass=" . $old_pass . "");
            //echo $uid_user."__".$old_pass;
        }
        mysqli_close($con);
        //}
    } else {
        header("location: User_Account.php?model=Change_pass&&error=connect_error");
    }
    /* $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
      $query = "select * from tbl_register where uid_user='" . $uid_user . "' and password='" . $old_pass . "'";
      $rows = mysqli_query($con, $query);
      if (!mysqli_connect_error()) {
      if (mysqli_num_rows($rows) == 1) {
      $q = "UPDATE tbl_register SET password='" . $new_pass . "' WHERE uid_user='" . $uid_user . "'";
      mysqli_query($con, $q);
      mysqli_close($con);
      header("location: User_Account.php?model=Change_pass&&change_pass=success");
      } else {
      header("location: User_Account.php?model=Change_pass&&error=pass_old_false");
      }
      }
      header("location: User_Account.php?model=Change_pass&&error=connect_error"); */
} else {
    header("location: User_Account.php?model=Change_pass&&error=not_nul");
}
?>
