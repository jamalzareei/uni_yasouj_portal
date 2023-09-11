<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$archive_title = $_POST["name_etla"];
$archive_date = $_POST["year_date_etla"] . "-" . $_POST["month_date_etla"] . "-" . $_POST["day_date_etla"];
$archive_message = $_POST["about_etla"];
$archive_link = "";
$num_visit = 1;
if (!empty($archive_title) && !empty($archive_date)) {
    
    include 'post_course.php';
    $insert_archive=$postcourse->insert_archive($archive_title,$archive_date,$archive_message,$archive_link,$num_visit);
    header("location: Admin_account.php?action=successful");
    /* $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
      mysqli_set_charset($con, 'utf8');
      if (!mysqli_connect_error()) {
      $query_reg = "insert into tbl_archive (archive_title,archive_message,archive_date,archive_link,num_visit) values (N'" . $archive_title . "',N'" . $archive_message . "',N'" . $archive_date . "',N'" . $archive_link . "',N'" . $num_visit . "')";

      mysqli_query($con, $query_reg);
      mysqli_close($con);
      header("location: Admin_account.php?action=successful");
      } else {
      header("location: Admin_account.php?ac=new_etlae&&h1=error_insert");
      }
      header("location: Admin_account.php?ac=new_etlae&&h=error_insert"); */
} else {
    header("location: Admin_account.php?ac=new_etlae&&h=error_insert");
}
?>
