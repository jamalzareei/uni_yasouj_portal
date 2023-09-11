<?php
session_start();
if ($_SESSION["safe"] != 1) {
    header("location: index.php");
}
include 'post_course.php';
$alletla = $postcourse->relate();
?>
<!--ser
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            دوره جدید
        </title>

        <link rel="stylesheet" type="text/css" href="css/Style.css"/>
    </head>
    <body>

        <div class="body_account">
            <a href="http://www.yu.ac.ir">
                <div class="logo">
                    <img src="img/img_uni.jpg" height="200" width="500">

                </div>
            </a>
            <div class="top_account">
                <?php
                $name_user = $_SESSION["username"];

                echo $name_user;
                echo " ! به سامانه آموزشی خوش آمدید ";
                ?>
            </div>
            <div class="sidebar_account">
                <a href="education.php"><div>
                        تقویم آموزشی
                    </div></a>
                <div class="hr"></div>
                <?php
                if ($_SESSION["safe"] == 1) {
                    ?>
                    <a href="User_Account.php?model=Courses"><div>
                            مشاهده دوره ها
                        </div></a> 
                    <div class="hr"></div>
                    <a href="Admin_account.php?ac=taeid"><div>
                            تایید دوره های در انتظار
                        </div></a>
                    <div class="hr"></div>
                    <a href="Admin_account.php?ac=search"><div>
                            جستجوی دوره های گذرانده شده هر شخص
                        </div></a>
                    <?php
                } else {
                    ?>
                    <a href="User_Account.php?model=Courses"><div>
                            ثبت نام دوره ها
                        </div></a>
                    <div class="hr"></div>
                    <a href="User_Account.php?model=courses_Register"><div>
                            مشاهده لیست دوره های اخذ شده
                       </div>  </a>
                    <?php
                }
                ?>
                <div class="hr"></div>
                <a href="User_Account.php?model=Archive"><div>
                        آرشیو اطلاعیه ها
                    </div></a>
                <div class="hr"></div>
                <a href="Admin_account.php?ac=new_course"><div>
                        اضافه کردن دوره
                    </div></a>
                <div class="hr"></div>
                <a href="Admin_account.php?ac=new_etlae"><div>
                        اضافه کردن اطلاعیه
                   </div> </a>
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
                <a href="logout.php"><div>
                        خروج
                    </div></a>
                <div class="hr"></div>
            </div>


            <?php
            if ($_GET["action"] == "successful") {
                echo '<div class="mess_account logins">';
                echo 'اطلاعات با موفقیت ثبت گردید';
                echo '</div>';
            }
            ?>

            <?php
            if ($_GET["ac"] == "new_course") {
                ?>
                <form name="form_course" method="post" action="insert_course.php" enctype="multipart/form-data">
                    <div class="mess_account">
                        <div class="insert_course">
                            <div class="row_course rows_insert header-row">
                                ثبت دوره جدید
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    کد دوره
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="number" name="id_cours" required="required" title="لطفا کد دوره را عددی وارد کنید" class="username" />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    نام دوره
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="text" name="name_cours" class="username" required="required" title="لطفا متنی وارد نمایید" />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    تاریخ شروع دوره
                                </div>
                                <div class="reg_col reg_col_2">

                                    <input type="text" name="day_date_course" class="username date_course" id="date_course" placeholder="روز" pattern="[0-9].{0,2}" required="required" />
                                    <input type="text" name="month_date_course" class="username date_course" id="date_course" placeholder="ماه" pattern="[0-9].{0,2}" required="required"  />
                                    <input type="text" name="year_date_course" value="13" class="username date_course" id="date_course" placeholder="سال" pattern="[0-9].{3,4}" required="required"  />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    تاریخ پایان دوره
                                </div>
                                <div class="reg_col reg_col_2">

                                    <input type="text" name="day_date_course_end" class="username date_course" id="date_course" placeholder="روز" pattern="[0-9].{0,2}" required="required" />
                                    <input type="text" name="month_date_course_end" class="username date_course" id="date_course" placeholder="ماه" pattern="[0-9].{0,2}" required="required"  />
                                    <input type="text" name="year_date_course_end" value="13" class="username date_course" id="date_course" placeholder="سال" pattern="[0-9].{3,4}" required="required"  />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    طول دوره
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="text" name="time_course" class="username" required="required" />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    مختص
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="text" name="espesial" class="username" required="required" />

                                    </select>
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    اطلاعات کامل دوره
                                </div>
                                <div class="reg_col reg_col_2">
                                    <textarea name="about_course" class="about_cours">

                                    </textarea>
                                </div>
                            </div> 
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    اپلود فایل پی دی اف در صورت وجود
                                </div>
                                <div class="reg_col reg_col_2">

                                    <input type="file" name="file_course" class="username" style="width: 50%" />

                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1 red">
                                    <?php
                                    if ($_GET["h"] == "Record_again") {
                                        echo 'کد دوره تکراری میباشد';
                                    }
                                    if ($_GET["h"] == "feilds_null") {
                                        echo 'لطفا همه فیلد ها را پر نمایید';
                                    }
                                    if ($_GET["h"] == "error_connect") {
                                        echo 'لطفا دوباره امتحان کنید';
                                    }
                                    ?>
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="submit" name="submit_cours" class="username" value="ثبت دوره" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
            }
            if ($_GET["ac"] == "new_etlae") {
                ?>

                <form name="form_etla" method="post" action="Insert_etlae.php">
                    <div class="mess_account">
                        <div class="insert_course">
                            <div class="row_course rows_insert header-row">
                                ثبت اطلاعیه جدید
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    موضوع اطلاعیه
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="text" name="name_etla" class="username" required="required" />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    تاریخ اطلاعیه
                                </div>
                                <div class="reg_col reg_col_2">
                                    <!--<input type="date" name="date_course" class="username" placeholder="--/--/--"/>-->
                                    <input type="text" name="day_date_etla" class="username date_course" id="date_course" placeholder="روز" pattern="[0-9].{0,2}" required="required" />
                                    <input type="text" name="month_date_etla" class="username date_course" id="date_course" placeholder="ماه" pattern="[0-9].{0,2}" required="required"  />
                                    <input type="text" name="year_date_etla" value="13" class="username date_course" id="date_course" placeholder="سال" pattern="[0-9].{3,4}" required="required"  />
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    متن کامل اطلاعیه
                                </div>
                                <div class="reg_col reg_col_2">
                                    <textarea name="about_etla" class="about_cours">

                                    </textarea>
                                </div>
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1 red">
                                    <?php
                                    if ($_GET["action"] == "successful") {
                                        echo 'اطلاعات با موفقیت ثبت گردید';
                                    }
                                    if ($_GET["h"] == "error_insert") {
                                        echo 'دوباره امتحان کنید همه فیلدها را پر کنید';
                                    }
                                    ?>
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="submit" name="submit_cours" class="username" value="ثبت اطلاعیه" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php
            }
            ?>

            <?php
            if (isset($_GET["mark"])) {
                echo '';
                ?>
                <div style="float: left;margin: 15px;width: 300px;">

                    <a href="exel_course_reg.php?mark=<?php echo $_GET["mark"]; ?>" target="_blank" style="margin: 20px 20px;">
                        <input type="button" value="گرفتن خروجی با اکسل"/>
                    </a>
                </div><br>
                <div class="mess_account">
                    <div class="course">
                        <div class="header_course">
                            ثبت نمرات
                        </div>
                        <div class="row_course">
                            <div class="col_course header_col_course">
                                کد دوره
                            </div>
                            <div class="col_course header_col_course">
                                نام دوره
                            </div>
                            <div class="col_course header_col_course">
                                کد کاربر
                            </div>
                            <div class="col_course header_col_course">
                                نام کاربر
                            </div>
                            <div class="col_course header_col_course">
                                وارد کردن نمره
                            </div>
                            <div class="col_course header_col_course">

                            </div>

                        </div>
                        <?php
                        //include 'DB.php';
                        //$a1 = new DB();
                        //$a1->connetion('localhost', "root", "", "db_uni_portal");
                        //$b1 = $a1->query("select * from tbl_course_register where uid_course=" . $_GET["mark"] . " order by ID DESC");
                        $coure_reg_mark = $postcourse->course_reg_mark($_GET["mark"]);
                        //while ($rows1 = mysqli_fetch_assoc($b1)) {
                        if (is_array($coure_reg_mark)) {
                            foreach ($coure_reg_mark as $rows1) {
                                echo ' <div class="row_course">
                            <div class="col_course">
                                ' . $rows1["uid_course"] . '
                            </div>
                            <div class="col_course">
                           ' . $rows1["course_name"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows1["uid_user"] . '
                            </div>
                            <div class="col_course">
                           ' . $rows1["name_user"] . '
                            </div>
                            <div class="col_course">
                                <input type="text" name="txt_mark" value="' . $rows1["mark"] . '" class="' . $rows1["id"] . '" id="marks" placeholder="نمره را وارد کنید" />
                            </div>
                            <div class="col_course div_akhz">
                                <input type="button" value="ثبت نمره" class="akhz" id="akhz" onclick="ins(' . $rows1["id"] . ')" />
                            </div>

                        </div> ';
                            }
                        }
                        ?>
                    </div>
                    <?php
                    echo '</div>';
                }
                ?>

                <?php
                if ($_GET["ac"] == "connect-us") {
                    echo '<div class="mess_account">';
                    if (is_array($alletla)) {
                        foreach ($alletla as $row_etla) {
                            echo '
                           <div class="course" style="text-align: right;">
                    <div class="row_course" style="float: right;padding: 20px 50px;font-size: 20px;width: 100%;background:#2dc1c1;">
                        <div>' . $row_etla["sender_name"] . '</div>
                        <div>' . $row_etla["sender_mail"] . '</div>

                    </div>
                    <div class="row_course" style="float: right;width: 100%;height: 200px;overflow: auto;word-break: break-all;margin: 10px 70px 10px 50px;">
                        ' . $row_etla["message"] . '
                    </div>
                </div>
                <div class="hr"></div>
             
';
                        }
                    }
                    echo '</div>';
                }
                ?>
                <?php
                if ($_GET["ac"] == "ayin" || $_GET["ac"] == "taghvim") {
                    ?>

                    <form name="form_etla" method="post" action="upload_file.php" enctype="multipart/form-data">
                        <div class="mess_account">
                            <div class="insert_course">
                                <div class="row_course rows_insert header-row">
                                    آپلود فایل
                                </div>
                                <div class="reg_row">
                                    <div class="reg_col reg_col_1">
                                        انتخاب فایل
                                    </div>
                                    <div class="reg_col reg_col_2">
                                        <input type="file" name="file" class="username" required="required" style="width: 200px" />
                                    </div>
                                </div>
                                <div class="reg_row">
                                    <div class="reg_col reg_col_1">
                                    </div>
                                    <div class="reg_col reg_col_2">
                                    </div>
                                </div>
                                <div class="reg_row">
                                    <div class="reg_col reg_col_1">

                                    </div>
                                    <div class="reg_col reg_col_2">
                                        <select name="types">
                                            <option value="ayiinname">
                                                آیین نامه
                                            </option>
                                            <option value="taghvim">
                                                تقویم آموزشی
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="reg_row">
                                    <div class="reg_col reg_col_1">
                                    </div>
                                    <div class="reg_col reg_col_2">
                                    </div>
                                </div>
                                <div class="reg_row">
                                    <div class="reg_col reg_col_1 red">
                                        <?php
                                        if ($_GET["action"] == "successful") {
                                            echo 'اطلاعات با موفقیت ثبت گردید';
                                        }
                                        if ($_GET["error"] == "true") {
                                            echo 'دوباره امتحان کنید پسوند فایل باید pdf باشد';
                                        }
                                        ?>
                                    </div>
                                    <div class="reg_col reg_col_2">
                                        <input type="submit" name="submit_cours" class="username" value="ثبت اطلاعیه" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php
                }
                ?>
                <!--
                namayesh dore haye taeid nashode modir   
                -->
                <?php
                if ($_GET["ac"] == "taeid") {
                    ?>
                    <div class="course">
                        <div class="header_course">
                            دوره های در انتظار تایید
                        </div>
                        <div class="row_course">
                            <div class="col_course header_col_course" style="width: 30%;" >
                                نام دوره
                            </div>
                            <div class="col_course header_col_course">
                                نام کاربر
                            </div>
                            <div class="col_course header_col_course">
                                کد ملی کاربر
                            </div>
                            <div class="col_course header_col_course" style="width: 10%;">
                                تایید
                            </div>

                        </div>
    <?php
    //include 'DB.php';
    //$a1 = new DB();
    //$a1->connetion('localhost', "root", "", "db_uni_portal");
    //$b1 = $a1->query("select * from tbl_course_register where uid_user=" . $_SESSION["uid_user"] . " order by ID DESC");
    $coure_reg_mark = $postcourse->course_reg_admin();
    //while ($rows1 = mysqli_fetch_assoc($b1)) {
    if (is_array($coure_reg_mark)) {
        foreach ($coure_reg_mark as $rows1) {

            // while ($rows1 = mysqli_fetch_assoc($b1)) {
            echo ' <div class="row_course">
                            <div class="col_course" style="width: 30%;">
                           ' . $rows1["course_name"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows1["name_user"] . '
                            </div>
                            <div class="col_course">
                           ' . $rows1["uid_user"] . '
                            </div>
                            <div class="col_course" style="width: 10%;">
                               <input type="button" value="تایید" onclick="taeid(' . $rows1["id"] . ')" class="' . $rows1["id"] . '" style="height: 25px;margin-top:2px"/>
                            </div>

                        </div> ';
        }
    } else {
        echo '<br/><br/><br/>
                        <div class="logins">
                          هیچ رکوردی پیدا نشد
                        </div>';
    }
    ?>
                    </div>
                        <?php
                    }
                    ?>
                <?php
                if ($_GET["ac"] == "search") {
                    ?>
                    
   
                    <div class="mess_account">
                <form name="form_etla" method="post" action="Admin_account.php?ac=search">
                        <div class="insert_course">
                            <div class="row_course rows_insert header-row">
جستجوی دورهای گذرانده شده توسط کاربر
                            </div>
                            <div class="reg_row">
                                <div class="reg_col reg_col_1">
                                    <input type="submit" value="جستجو"/>
                                </div>
                                <div class="reg_col reg_col_2">
                                    <input type="text" name="searcher" class="username" style="margin-top: 19px;" placeholder="جستجو بر اساس نام و کد ملی" />
                                </div>
                            </div>
                            
                            
                        </div>
                </form>
                <br>
                    <div class="course">
                        <div class="header_course">
                           نتایج
                        </div>
                        <div class="row_course">
                            <div class="col_course header_col_course">
کد دوره
                            </div>
                            <div class="col_course header_col_course">
نام دوره
                            </div>
                            <div class="col_course header_col_course">
نام کاربر
                            </div>
                            <div class="col_course header_col_course">
کد ملی کاربر
                            </div>
                            <div class="col_course header_col_course">
تاریخ دوره
                            </div>
                            <div class="col_course header_col_course">
                               نمره دوره
                            </div>

                        </div>
                        <?php
                        $search=$_POST["searcher"];
                        //include 'DB.php';
                        //$a1 = new DB();
                        //$a1->connetion('localhost', "root", "", "db_uni_portal");
                        //$b1 = $a1->query("select * from tbl_course_register where uid_course=" . $_GET["mark"] . " order by ID DESC");
                        $coure_reg_serach = $postcourse->course_reg_search($search);
                        //while ($rows1 = mysqli_fetch_assoc($b1)) {
                        if (is_array($coure_reg_serach)) {
                            foreach ($coure_reg_serach as $rows2) {
                                echo ' <div class="row_course">
                            <div class="col_course">
                                ' . $rows2["uid_course"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows2["course_name"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows2["uid_user"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows2["uid_user"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows2["uid_user"] . '
                            </div>
                            <div class="col_course">
                                ' . $rows2["uid_user"] . '
                            </div>

                        </div> ';
                            }
                        }
 else {
                            echo '<hr><br><div class="row_course logins" style="width:100%;float:right;text-align:center">هیچ رکوردی یافت نشد</div>';
 }
                        ?>
                    </div>
                
                    </div>
    <?php
}
?>
                <script type="text/javascript" language="javascipt" src="js/jquery-1.10.2.min.js"></script>
                <script type="text/javascript">
                    function ins(id){
                        var ma=$("."+id).val();
                        //alert(id+"-"+mark);
                        $.post('ajax.php', {id_course_reg:id,mark:ma}, function(data){
                            alert("با موفقیت ثبت گردید");
                        });
                    }
                    function taeid(id){
                        $.post('ajax.php', {id_taeid:id}, function(data){
                            alert("با موفقیت ثبت گردید");
                            $("."+id).attr("disabled","true");
                            $("."+id).css("background","#000");
                        });
                    }
                </script>
                </body>
                </html>
