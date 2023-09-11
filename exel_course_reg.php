<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET["mark"])) {
    $mark=$_GET["mark"];
    include 'post_course.php';
    $course_reg = $postcourse->course_reg_mark($mark);
//while ($rows = mysqli_fetch_assoc($b)) {
    if (is_array($course_reg)) {
        $excel = '<table><tr>
<td style="font-size:20px;">ای دی</td>
<td style="font-size:20px;">کد کاربر</td>
<td style="font-size:20px;">نام کاربر</td>
<td style="font-size:20px;">کد دوره</td>
<td style="font-size:20px;">نام دوره</td>
<td style="font-size:20px;">درباره دوره</td>
<td style="font-size:20px;">تاریخ شروع دوره</td>
<td style="font-size:20px;">طول دوره</td>
<td style="font-size:20px;">نمره</td>
</tr>';
        foreach ($course_reg as $row) {
            $excel.="<tr>
<td>{$row['id']}</td>
<td>{$row['uid_user']}</td>
<td>{$row['name_user']}</td>
<td>{$row['uid_course']}</td>
<td>{$row['course_name']}</td>
<td>{$row['course_mess']}</td>
<td>{$row['course_date']}</td>
<td>{$row['course_time']}</td>
<td>{$row['mark']}</td>
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
}
?>
