<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            تماس با ما
        </title>
        <link rel="stylesheet" type="text/css" href="css/Style.css"/>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div class="menu">
            <ul style="">
                <li style="width: 320px;"><a href="">کابر گرامی به سامانه آموزش ضمن خدمت خوش آمدید</a></li>
                <li style="width: 180px;"><a href="http://www.yu.ac.ir">صفحه اصلی دانشگاه</a></li>
                <li style="width: 100px;"><a href="index.php">ورود</a></li>
                <li style="width: 100px"><a href="Register.php">ثبت نام</a></li>
                <li style="width: 100px"><a href="Connect-us.php"> تماس با ما</a></li>
            </ul>
        </div>
        <div class="hr"></div>
        <div style="float: right">
        <div class="connect_us">
            <div class="reg_row" style="background: gray;">
                <div class="reg_col reg_col_1" style="text-align: right">
                   تماس با واحد آموزش همکاران 
                </div>
                <div class="reg_col reg_col_2" style="padding-top: 10px;font-size: 18px;text-align: right">
                    074-33 24 21 54
                </div>
            </div>
            <div class="hr"></div>
            <div class="header_pass" style="padding: 20px 0;">
                پیشنهاد
            </div>
            <div class="hr"></div>
            <form name="send_connect" action="relat.php" method="get">
            <div class="reg_row">
                <div class="reg_col reg_col_1" style="text-align: right">
                    نام 
                </div>
                <div class="reg_col reg_col_2">
                    <input type="text" name="sender_name" required="required"/>
                </div>
            </div>
            <div class="reg_row">
                <div class="reg_col_1 reg_col" style="text-align: right">
                    ایمیل
                </div>
                <div class="reg_col_2 reg_col">
                    <input type="email" name="sender_mail" required="required" />
                </div>
            </div>
            <div class="reg_row">
                <div class="reg_col_1 reg_col" style="text-align: right">
                    متن پیام شما
                </div>
                <div class="reg_col_2 reg_col">
                    <textarea name="message" class="about_cours" style="max-width: 355px;">

                    </textarea>
                </div>
            </div>
            <div class="reg_row">
                <div class="reg_col_1 reg_col green" style="text-align: right">
                    <?php
                    if($_GET["message"]=="send"){
                        echo 'پیام شما ارسال گردید';
                    }
                    ?>
                </div>
                <div class="reg_col_2 reg_col">
                    <input type="submit" value="ارسال پیام"/>
                </div>
            </div>
                </form>
        </div></div>
    </body>
</html>
