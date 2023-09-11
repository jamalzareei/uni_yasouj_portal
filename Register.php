<?php
session_start();
session_start();
if ($_SESSION["safe"] != NULL) {
    header("location: User_Account.php");
}
$SecCode = md5(rand(0, 9999));
$SecCode = strtolower($SecCode);
$_SESSION['SecImageStr'] = strtoupper(substr($SecCode, 0, 4));
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
            ثبت نام
        </title>
        <link rel="stylesheet" type="text/css" href="css/Style.css"/>
        <script type="text/javascript" src="js/jquery-min.js"/>
        <script>
            function security(){
                $.post('Securitycode.php', {user:document.getElementById('sec_img').value,status:'2'},
                function(data){
                    $("#div_sec").html(data);
                });
            }
        </script> 
    </head>
    <body>
        <?php
        /* session_start();
          $text = "QWERTYUIOPLKJHGFDSAZXCVBNM0123456789";
          $security = '';
          for ($i = 1; $i < 6; $i++) {
          $start = rand(0, strlen($text));
          $security.=substr($text, $start, 1);
          }
          $_SESSION["security_coder"] = $security; */
        ?>
        <div class="menu">
            <ul>
                <li style="width: 320px;"><a href="">کابر گرامی به سامانه آموزش ضمن خدمت خوش آمدید</a></li>
                <li style="width: 180px;"><a href="http://www.yu.ac.ir">صفحه اصلی دانشگاه</a></li>
                <li style="width: 100px;"><a href="index.php">ورود</a></li>
                <li style="width: 100px"><a href="Register.php">ثبت نام</a></li>
                <li style="width: 100px"><a href="Connect-us.php"> تماس با ما</a></li>
            </ul>
        </div>
        <div class="hr"></div>
        <div class="body_reg">
            <div class="logins" style="margin: 5px">
                ثبت نام
            </div>
            <!-- <div class="left_reg">
                 <div class="header_reg">
                     ثبت نام
                 </div>
                 <div class="img_left_reg">
 
                 </div>
             </div>-->
            <form name="" action="Register_submit.php" method="post">
                <div class="right_reg"> 

                    <div class="reg_row red">
                        <?php
                        //$type=$_GET["type"];
                        if (isset($_GET["text"]) && $_GET["text"] == "error") {
                            echo '!لطفا همه فیلدها را پر کنید ';
                        }
                        if (isset($_GET["action"]) && $_GET["action"] == "error_ceurity") {
                            echo 'کد امنیتی وارد شده اشتباه میباشد ';
                        }
                        if ($_GET["user"] == "error") {
                            echo ' این کد ملی یا شماره شناسنامه قبلا ثبت نام شده است';
                        }
                        ?>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            نام و نام خانوادگی 
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="name_user" class="username" required="required" />
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            (کد ملی (نام کاربری 
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="code_meli" class="username" required="required" pattern="[0-9].{9}" />
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            (شماره شناسنامه (رمز عبور 
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="serial_number" class="username" required="required" pattern="[0-9].{1,9}" />
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            صادره از 
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="sadere" class="username" required="required" />
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            نام پدر
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="father_name" class="username" required="required"/>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            جنسیت
                        </div>
                        <div class="reg_col reg_col_2">

                            <select name="sex">
                                <option value="مذکر">
                                    مذکر
                                </option>
                                <option value="مونث">
                                    مونث
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            مدرک تحصیلی
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="madrak" class="username" required="required"/>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            رشته تحصیلی
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="reshte" class="username" required="required"/>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            عنوان پست سازمانی
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="post_s" class="username"/>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            نوع استخدام
                        </div>
                        <div class="reg_col reg_col_2">
                            <select id="employ_type" name="employ_type">
                                <option value="رسمی">
                                    رسمی
                                </option>
                                <option value="پیمانی">
                                    پیمانی
                                </option>
                                <option value="قراردادی">
                                    قراردادی
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            تلفن تماس
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="number" name="tell" class="username" required="required" pattern="[0-9].{9,10}" placeholder="9*********"/>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1 ref_sec">

                        </div>
                        <div class="reg_col reg_col_2 img_security">

                            <img src="Securitycode.php" width="200" height="50"/>

                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                            <span class="red">*</span>
                            کد امنیتی
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="text" name="security" class="username" id="sec_img"/>
                        </div>
                    </div>
                    <div class="reg_row">
                        <div class="reg_col reg_col_1">
                        </div>
                        <div class="reg_col reg_col_2">
                            <input type="submit" name="reg" class="username" value="ثبت نام" id="sec_img"/>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </body>
</html>
