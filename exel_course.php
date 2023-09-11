<?php

/* $DB_Server = "localhost"; // MySQL Server
  $DB_Username = "root"; // MySQL Username
  $DB_Password = ""; // MySQL Password
  $DB_DBName = "db_uni_portal"; // MySQL Database Name
  $DB_TBLName = "tbl_course"; // MySQL Table Name
  $xls_filename = "export_".date("Y-m-d").".xls"; // Define Excel (.xls) file name

  $sql = "Select * from $DB_TBLName";

  $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());
  // Select database
  $Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());
  // Execute query
  $result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());

  // Header info settings
  header("Content-Type: application/xls");
  header("Content-Disposition: attachment; filename=$xls_filename");
  header("Pragma: no-cache");
  header("Expires: 0");
  mysql_query("SET CHARACTER SET utf8");
  mysql_query("SET NAMES utf8_persian_ci");

  /***** Start of Formatting for Excel **** */
// Define separator (defines columns in excel &amp; tabs in word)
$sep = " "; // tabbed character
// Start of printing column names as names of MySQL fields
/* for ($i = 0; $i<mysql_num_fields($result); $i++) {
  echo mysql_field_name($result, $i) . " ";
  }
  print(" ");
  // End of printing column names

  // Start while loop to get data
  while($row = mysql_fetch_row($result))
  {
  $schema_insert = "";
  for($j=0; $j<mysql_num_fields($result); $j++)
  {
  if(!isset($row[$j])) {
  $schema_insert .= "NULL".$sep;
  }
  elseif ($row[$j] != "") {
  $schema_insert .= "$row[$j]".$sep;
  }
  else {
  $schema_insert .= "".$sep;
  }
  }
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/ | | | /", " ", $schema_insert);
  $schema_insert .= " ";
  print(trim($schema_insert));
  print " ";
  } */
include 'post_course.php';
$courses = $postcourse->course();
//while ($rows = mysqli_fetch_assoc($b)) {
if (is_array($courses)) {
    $excel = '<table><tr>
<td style="font-size:20px;">ای دی</td>
<td style="font-size:20px;">کد دوره</td>
<td style="font-size:20px;">نام دوره</td>
<td style="font-size:20px;">تاریخ شروع دوره</td>
<td style="font-size:20px;">تاریخ پایان دوره</td>
<td style="font-size:20px;">طول دوره</td>
<td style="font-size:20px;">مدیران/اعضا</td>
<td style="font-size:20px;">تعداد ثبت نام کنندگان دوره</td>
<td style="font-size:20px;">متن کامل دوره</td>
</tr>';
    foreach ($courses as $row) {
        $excel.="<tr>
<td>{$row['id']}</td>
<td>{$row['uid_course']}</td>
<td>{$row['course_name']}</td>
<td>{$row['course_date']}</td>
<td>{$row['course_date_end']}</td>
<td>{$row['course_time']}</td>
<td>{$row['espesial']}</td>
<td>{$row['enrolment']}</td>
<td>{$row['course_mess']}</td>
</tr>";
    }
    $excel.='</table>';
}
ob_start();
ob_clean();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
print $excel;
die();
?>