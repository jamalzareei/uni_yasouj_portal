<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$uid_course = $_POST["id_cours"];
$course_name = $_POST["name_cours"];
$course_date = $_POST["year_date_course"]."-".$_POST["month_date_course"]."-".$_POST["day_date_course"];
$course_date_end=$_POST["year_date_course_end"]."-".$_POST["month_date_course_end"]."-".$_POST["day_date_course_end"];
$espesial=$_POST["espesial"];
$course_time = $_POST["time_course"];
$course_mess = $_POST["about_course"];
$enrolment = 0;



$upload=$uid_course.".pdf";


if(!empty($uid_course) && !empty($course_name) && !empty($course_date) && !empty($course_time)){
    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
mysqli_set_charset($con, 'utf8');
if (!mysqli_connect_error()) {
    $query = "select * from tbl_course where uid_course='".$uid_course."'";
    //$result = mysql_query($query, $db_link);
    //$count = mysql_num_rows($result);
    $rows=  mysqli_query($con, $query);
    if (mysqli_num_rows($rows) < 1) {
        $query_reg = "insert into tbl_course (uid_course,course_name,course_mess,course_date,course_time,enrolment,course_date_end,espesial,details)
            values (N'" . $uid_course . "',N'" . $course_name . "',N'" . $course_mess . "',N'" . $course_date . "',N'" . $course_time . "',N'" . $enrolment . "',N'" . $course_date_end . "',N'" . $espesial . "',N'" . $upload . "')";

        mysqli_query($con, $query_reg);
        $query_etla="insert into tbl_archive (archive_title,archive_message,archive_date,archive_link,num_visit)
            values(N'" . $course_name . "',N'" . $course_mess . "',N'" . date("Y-m-d") . "',N'" . "" . "',N'" . 0 . "')";
        mysqli_query($con, $query_etla);
        mysqli_close($con);
        header("location: Admin_account.php?action=successful");
    } else {
        header("location: Admin_account.php?ac=new_course&&h=Record_again");
    }
} else {
    header("location: Admin_account.php?ac=new_course&h=error_connect");
}
}
 else {
    header("location: Admin_account.php?ac=new_course&h=feilds_null");
}

$allowedExts = array("pdf");
$temp = explode(".", $_FILES["file_course"]["name"]);
$extension = end($temp);
if (($_FILES["file_course"]["type"] == "application/pdf")
&& in_array($extension, $allowedExts)){
    if ($_FILES["file_course"]["error"] > 0){
       // echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        header("location: Admin_account.php?ac=ayin&error=true");
    }else{
        //echo "Upload: " . $_FILES["file"]["name"] . "<br>";application/pdf
        //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        $name_file=$uid_course.".pdf";
        //if (file_exists("upload/" . $_FILES["file"]["name"])){
        //    echo $_FILES["file"]["name"] . " already exists. ";
       // }else{
            move_uploaded_file($_FILES["file_course"]["tmp_name"],
            "upload/" . $name_file);
            //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            header("location: Admin_account.php?action=successful");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        //}
    }
}else{
    header("location: Admin_account.php?ac=ayin&error=true");
}
?>
