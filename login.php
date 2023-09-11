<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include 'Con_db.php';
session_start();

if ($_POST["code_meli"] && $_POST["password"]) {


//$tbl_name = "tbl_register";
    //$username = $_POST["username"];
    $code_meli = $_POST["code_meli"];
    $password = md5($_POST["password"]);
    include 'post_course.php';
    //$log=$user->getUserSpec($username,$code_meli,$password);
    $log = $postcourse->login($code_meli, $password);
    //while ($rows = mysqli_fetch_assoc($b)) {
    if (is_array($log)) {
        foreach ($log as $rows) {
            $_SESSION["username"] = $rows["name_user"];
            $_SESSION["uid_user"] = $code_meli;
            $_SESSION["safe"] = $rows["safe"];
            header("location: User_Account.php?model=Archive");
        }
    } else {
        header("location:index.php?type=error");
    }
}
    /* $successfull = FALSE;
      $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
      mysqli_set_charset($con, 'utf8');
      $query = "select * from $tbl_name where name_user='$username' and uid_user='$code_meli' and password='$password'";
      $result = mysqli_query($con, $query);
      $count = mysqli_num_rows($result);
      if ($count == 1) {
      $successfull = TRUE;

      $_SESSION["username"] = $username;
      $_SESSION["uid_user"] = $code_meli;
      }
      while ($row_user=  mysqli_fetch_assoc($result)){
      $_SESSION["safe"] = $row_user["safe"];
      }

      if ($successfull == TRUE) {
      header("location:User_Account.php?login=success");
      } else {
      header("location:index.php?type=error");
      }

      mysqli_close($con); */
?>
