<?php
session_start();
if (!isset($_SESSION["safe"])) {
    header("location: index.php");
}
include 'post_course.php';
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            حساب کاربری
        </title>
        <link rel="stylesheet" type="text/css" href="css/Style.css"/>

    </head>
    <body>
        <?php
        // put your code here
        ?>

        <div class="body_account">
            <a href="http://www.yu.ac.ir">
                <div class="logo">
                    <img src="img/img_uni.jpg" height="200" width="500">
                    <div class="log">
                        Yasouj University
                    </div>
                </div>
            </a>
            <div class="top_account">
                <?php
                $name_user = $_SESSION["username"];
                echo "کاربر گرامی : ";
                echo "<label>".$name_user."</label>";
                echo "   به سامانه آموزش دوره ضمن خدمت خوش آمدید";
                ?>
            </div>
            <div class="sidebar_account">
                <div><a href="education.php">
                        تقویم آموزشی
                    </a></div>
                <div class="hr"></div>
                <?php
                /* if ($_SESSION["safe"] == "2") {
                  echo '  <div><a href="User_Account.php?model=Courses">
                  لیست افراد حاضر در دوره
                  </a></div>
                  <div class="hr"></div>';
                  } */
                ?>

                <?php
                if ($_SESSION["safe"] == 1) {
                    ?>
                    <div><a href="User_Account.php?model=Courses">
                            مشاهده دوره ها
                        </a></div> 
                <div class="hr"></div>
                <div><a href="Admin_account.php?ac=taeid">
تایید دوره های در انتظار
                    </a></div>
                    <div class="hr"></div>
                    <div><a href="Admin_account.php?ac=search">
                            جستجوی دوره های گذرانده شده هر شخص
                        </a></div>
                    <?php
                } else {
                    ?>
                    <div><a href="User_Account.php?model=Courses">
                            ثبت نام دوره ها
                        </a></div> 
                    <div class="hr"></div>
                    <div><a href="User_Account.php?model=courses_Register">
                            مشاهده لیست دوره های اخذ شده
                        </a></div>
                    <?php
                }
                ?>
                <div class="hr"></div>
                <div><a href="User_Account.php?model=Archive">
                        آرشیو اطلاعیه ها
                    </a></div>
                <div class="hr"></div>


                <?php
                if ($_SESSION["safe"] == 1) {
                    ?>
                    <a href="Admin_account.php?ac=new_course"><div>
                            اضافه کردن دوره
                        </div></a>
                    <div class="hr"></div>
                    <a href="Admin_account.php?ac=new_etlae"><div>
                            اضافه کردن اطلاعیه
                        </div></a>
                    <div class="hr"></div>
                    <a href="Admin_account.php?ac=connect-us"><div>
                            پیامهای رسیده
                        </div></a>
                    <div class="hr"></div>
                    <a href="Admin_account.php?ac=taghvim"><div>
                            اضافه کردن تقویم آموزشی/آیین نامه
                        </div></a>
                    <div class="hr"></div>
                <a href="User_Account.php?model=Change_pass"><div>
                        تغییر رمز عبور
                    </div></a>
                <div class="hr"></div>

                    <?php
                }
                ?>
                <a href="logout.php"><div>
                        خروج
                    </div></a>
                <div class="hr"></div>
            </div>
            <div class="mess_account">

                <?php
                // put your code here
                if ($_GET["login"] == "success") {
                    echo '<br><br/><br/>
                        <div class="logins">
                            شما با موفقیت وارد شدید
                        </div>';
                }
                if (isset($_GET["model"]) && $_GET["model"] == "Courses") {
                    ?>
                    <div style="float: left;margin: 15px;width: 300px;">

                        <a href="exel_course.php" target="_blank" style="margin: 20px 20px;">
                            <input type="button" value="گرفتن خروجی با اکسل"/>
                        </a>
                    </div><br>
                    <div class="course">
                        <div class="header_course">
                            دوره ها
                        </div>
                        <div class="row_course">
                            <div class="col_course header_col_course withs">
                                کد دوره
                            </div>
                            <div class="col_course header_col_course withs" style="width: 35%">
                                نام دوره
                            </div>
                            <div class="col_course header_col_course withs" style="width: 10%;">
                                تاریخ شروع
                            </div>
                            <div class="col_course header_col_course withs" style="width: 10%;">
                                تاریخ پایان
                            </div>
                            <div class="col_course header_col_course withs">
                                طول دوره
                            </div>
                            <div class="col_course header_col_course withs">
                                مختص
                            </div>
                            <?php
                            if($_SESSION["safe"] == 1){
                                echo '
<div class="col_course header_col_course withs" style="font-size: 10px">
                                تعداد ثبت نام کنندگان
                            </div>                                    
';
                            }
 else {
     
                                echo '
<div class="col_course header_col_course withs" style="font-size: 10px">
                              جزئیات
                            </div>                                    
';
 }
                            ?>
                            
                            <div class="col_course header_col_course withs" style="width: 12%">

                            </div>

                        </div>
                        <?php
                        // include 'DB.php';
                        //$a = new DB();
                        // $a->connetion('localhost', "root", "", "db_uni_portal");
                        // $b = $a->query("select * from tbl_course order by ID DESC");
                        $courses = $postcourse->course();
                        //while ($rows = mysqli_fetch_assoc($b)) {
                        $u_user = $_SESSION["uid_user"];
                        if (is_array($courses)) {
                            foreach ($courses as $rows) {

                                $cour_reg = $postcourse->course_reg_tek($u_user, $rows["uid_course"]);
                                if (!is_array($cour_reg)) {



                                    echo '
                                <div id="row_course" class="row_course">
                                <a id="row_course" href="User_Account.php?id-course=' . $rows["id"] . '">
                        <div class="col_course withs">
                            ' . $rows["uid_course"] . '
                        </div>
                        <div class="col_course withs" style="width: 35%">
                          ' . $rows["course_name"] . '
                        </div>
                        <div class="col_course withs" style="width: 10%;">
                            ' . $rows["course_date"] . '
                        </div>
                        <div class="col_course withs" style="width: 10%;">
                            ' . $rows["course_date_end"] . '
                        </div>
                        <div class="col_course withs">
                          ' . $rows["course_time"] . '
                        </div>
                        <div class="col_course withs">
                            ' . $rows["espesial"] . '
                        </div></a>';
                               if ($_SESSION["safe"] == 1){
                                   echo '

                        <div class="col_course withs">
                            ' . $rows["enrolment"] . '
                        </div>                                       
';  
                               }   
 else {echo '
     <div class="col_course withs">
     <a href="details.php?det=' . $rows["details"] . '" target="_blanks">جزئیات</a>
                            
                        </div>                                    
';  
 }
                                    
                                    
                                    
                                    echo '<div class="col_course div_akhz withs" style="width: 12%">';
                                    if ($_SESSION["safe"] == 1) {
                                        echo '       <a href="Admin_account.php?mark=' . $rows["uid_course"] . '" >  <input type="button" id="akhz" style="width:70%" value="ویرایش نمرات"/></a>';
                                    } else {


                                        echo '<input type="button" value="اخذ" onclick="akhzis(' . $rows["id"] . ')" name="' . $rows["id"] . '" class="akhz_course" style="height: 25px;margin-top:2px" id="' . $rows["id"] . '"/>';
                                    }

                                    echo '     </div>

                    </div>';
                                }
                            }
                            //gereftan exel
                        }
 else {
     echo '<br><br/><br/>
                        <div class="logins">
                          هیچ رکوردی پیدا نشد
                        </div>';
 }
                        ?>
                    </div>
                    <?php
                }
                if (isset($_GET["model"]) && $_GET["model"] == "courses_Register") {
                    ?>

                    <div class="course">
                        <div class="header_course">
                            دروه های اخذ شده
                        </div>
                        <div class="row_course">
                            <div class="col_course header_col_course">
                                کد دوره
                            </div>
                            <div class="col_course header_col_course" style="width: 38%;">
                                نام دوره
                            </div>
                            <div class="col_course header_col_course">
                                تاریخ شروع
                            </div>
                            <div class="col_course header_col_course">
                                طول دوره
                            </div>
                            <div class="col_course header_col_course" style="width: 10%;">
                                نمره
                            </div>

                        </div>
                        <?php
                        //include 'DB.php';
                        //$a1 = new DB();
                        //$a1->connetion('localhost', "root", "", "db_uni_portal");
                        //$b1 = $a1->query("select * from tbl_course_register where uid_user=" . $_SESSION["uid_user"] . " order by ID DESC");
                        $coure_reg_mark = $postcourse->course_reg_user($_SESSION["uid_user"]);
                        //while ($rows1 = mysqli_fetch_assoc($b1)) {
                        if (is_array($coure_reg_mark)) {
                            foreach ($coure_reg_mark as $rows1) {

                                // while ($rows1 = mysqli_fetch_assoc($b1)) {
                                echo ' <div class="row_course">
                            <div class="col_course">
                                ' . $rows1["uid_course"] . '
                            </div>
                            <div class="col_course" style="width: 38%;">
                           ' . $rows1["course_name"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows1["course_date"] . '
                            </div>
                            <div class="col_course">
                           ' . $rows1["course_time"] . '
                            </div>
                            <div class="col_course" style="width: 10%;">';
                                if ($rows1["mark"] == 0 || $rows1["mark"] == "") {
                                    echo 'وارد نشده';
                                } else {
                                    echo $rows1["mark"];
                                }
                                echo '  </div>

                        </div> ';
                            }
                        }
                        else {
     echo '<br/><br/><br/>
                        <div class="logins">
                          هیچ رکوردی پیدا نشد
                        </div>';
 }
                        ?>
                    </div>
                    <?php
                }
                if (isset($_GET["model"]) && $_GET["model"] == "Archive") {
                    ?>
                    <?php
                    //include 'DB.php';
                    //$c = new DB();
                    //$c->connetion('localhost', "root", "", "db_uni_portal");
                    //$d = $c->query("select * from tbl_archive order by ID DESC");
                    $archive = $postcourse->archive();
                    //while ($rows1 = mysqli_fetch_assoc($b1)) {
                    if (is_array($archive)) {
                        foreach ($archive as $rows_archive) {
                            //while ($rows_archive = mysqli_fetch_assoc($d)) {


                            echo '<div class="course archives">
                    <div class="date_archive archive">
                        تاریخ :
                        ' . $rows_archive["archive_date"] . '
                    </div>
                    <div class="title_archive archive">
                    <a href="User_Account.php?id-arvhive=' . $rows_archive["id"] . '">
                       ' . $rows_archive["archive_title"] . '
                           </a>
                    </div>
                    <div class="num_archive archive">
                        ' . $rows_archive["num_visit"] . '
                        بازدید
                    </div>
                </div>';
                        }
                    }
                    else {
     echo '<br/><br/><br/>
                        <div class="logins">
                          هیچ رکوردی پیدا نشد
                        </div>';
 }
                    ?>
                    <?php
                }
                if (isset($_GET["model"]) && $_GET["model"] == "Change_pass") {
                    ?>
                    <div class="course">

                        <div class="change_pass">
                            <div class="header_pass">
                                تغییر پسورد
                            </div>
                            <div class="hr"></div>
                            <form name="changpass" action="change_pass.php" method="post">
                                <div class="row_course">
                                    <div class="col_pass1">
                                        پسورد قدیمی
                                    </div>

                                    <div class="col_pass">
                                        <input type="password" name="ol_pass"  required="required"/>
                                    </div>
                                </div>
                                <div class="row_course">
                                    <div class="col_pass1">
                                        پسورد جدید
                                    </div>

                                    <div class="col_pass">
                                        <input type="password" name="new_pass"  required="required" pattern=".{5,}" title="رمز عبور شما باید بیشتر از 6 کاراکتر باشد و شامل عدد و کاراکتر باشد"/>
                                    </div>
                                </div>
                                <div class="row_course">
                                    <div class="col_pass1">
                                        تکرار پسورد جدید
                                    </div>

                                    <div class="col_pass">
                                        <input type="password" name="re_new_pass" required="required" pattern=".{5,}" title="رمز عبور شما باید بیشتر از 6 کاراکتر باشد"/>
                                    </div>
                                </div>
                                <div class="row_course">
                                    <div class="col_pass1 green">
                                        <?php
                                        if ($_GET["change_pass"] == "success") {
                                            echo 'رمز عبور با موفقیت تغییر یافت';
                                        }
                                        if ($_GET["error"] == "pass_old_false") {
                                            echo 'رمز قدیمی شما اشتباه میباشد';
                                        }
                                        if ($_GET["error"] == "connect_error") {
                                            echo 'لطفا دوباره سعی نمایید';
                                        }
                                        if ($_GET["error"] == "not_set_passwords") {
                                            echo 'پسورد جدید با تکرار آن متفاوت میباشد';
                                        }
                                        if ($_GET["error"] == "not_nul") {
                                            echo 'لطفا همه فیلد ها را پر نمایید';
                                        }
                                        ?>
                                    </div>

                                    <div class="col_pass">
                                        <input type="submit" name="old_pass" value="تغییر رمز" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($_GET["id-arvhive"])) {
                    //$id_archive=$_GET["id-arvhive"];
                    //include 'DB.php';
                    //$id_c = new DB();
                    //$id_c->connetion('localhost', "root", "", "db_uni_portal");
                    //$id_d = $id_c->query("select * from tbl_archive where id='".$id_archive."'");
                    $archive_id = $postcourse->archive_id($_GET["id-arvhive"]);
                    if (is_array($archive_id)) {
                        foreach ($archive_id as $rows_ar) {
                            //while ($rows_ar = mysqli_fetch_assoc($id_d)) {
                            $num = $rows_ar["num_visit"] + 1;
                            //$up_arch = $id_c->query("UPDATE tbl_archive SET num_visit='".$num."' Where id='" . $id_archive . "'");
                            $postcourse->update_archive($num, $_GET["id-arvhive"]);

                            echo ' <div class="course messages">
                    <div class="arch title">
                        ' . $rows_ar["archive_title"] . '
                    </div>
                    <div class="row_course">
                        <div class="dates">تاریخ :
                            ' . $rows_ar["archive_date"] . '
                        </div>
                        <div class="dates">بازدید :
                            ' . $rows_ar["num_visit"] . '
                        </div>
                        <div class="dates">
                            <a href="User_Account.php?model=Archive">بازگشت</a>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="arch messa">
                        ' . $rows_ar["archive_message"] . '
                    </div>
                </div>';
                        }
                    }
                    else {
     echo '<br/><br/><br/>
                        <div class="logins">
                          هیچ رکوردی پیدا نشد
                        </div>';
 }
                }
                if (isset($_GET["id-course"])) {
                    //$id_course=$_GET["id-course"];
                    //include 'DB.php';
                    //$id_a = new DB();
                    //$id_a->connetion('localhost', "root", "", "db_uni_portal");
                    //$id_b = $id_a->query("select * from tbl_course WHERE id='$id_course'");
                    //while ($rows_co = mysqli_fetch_assoc($id_b)) {
                    $course_id = $postcourse->course_id($_GET["id-course"]);
                    if (is_array($course_id)) {
                        foreach ($course_id as $rows_co) {
                            echo ' <div class="course messages">
                    <div class="arch title">
                        ' . $rows_co["course_name"] . '
                    </div>
                    <div class="row_course">
                        <div class="dates">تاریخ برگزاری :
                            ' . $rows_co["course_date"] . '
                        </div>
                        <div class="dates">طول دوره :
                            ' . $rows_co["course_time"] . '
                        </div>
                        <div class="dates">
                            <a href="User_Account.php?model=Courses">بازگشت</a>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="arch messa">
                        ' . $rows_co["course_mess"] . '
                    </div>
                </div>';
                        }
                    }
                    else {
     echo '<br/><br/><br/>
                        <div class="logins">
                          هیچ رکوردی پیدا نشد
                        </div>';
 }
                }
                ?>






                <script type="text/javascript" language="javascipt" src="js/jquery-1.10.2.min.js"></script>
                <script type="text/javascript">
                    function akhzis(id){
                        $.post('ajax.php', {uid_course:id}, function(data){
                            alert("با موفقیت ثبت گردید پس از تایید مدیر در قسمت دوره های اخذ شده میتوانید مشاهده نمایید." );
                            $("#"+id).attr("disabled","false");
                            $("#"+id).css("display","none");
                        });
                    }
                    function del(id,id_course){
                        $.post('ajax.php', {uid_del:id,uid_course:id_course}, function(data){
                            alert("عملیت موفقیت آمیز بود");
                        });
                    }
                </script>

                </body>
                </html>
