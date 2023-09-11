<?php
    session_start();
    if($_SESSION["safe"]!=NULL){
        header("location: User_Account.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
            ورود
        </title>
        <link rel="stylesheet" type="text/css" href="css/Style.css"/>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <div>
            <div class="header">
                
            </div>
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
            <div class="headering">
                سامانه دوره آموزش ضمن  خدمت
            </div>
            <div class="bodys">
                <div class="login">
                    <div class="loguser" >
                        ورود کاربران
                    </div>
                    <form name="login1" action="login.php" method="post">
                    <!--<div>
                        <input type="text" name="username" class="login_username" placeholder="  (نام و نام خانوادگی (نام کاربری"  required="required"/>
                    </div>-->
                    <div>
                        <input type="text" name="code_meli" class="login_username" placeholder="  کد ملی" title="کد ملی ده رقمی میباشد" required="required" pattern="[0-9].{9}"/>
                    </div>
                    <div>
                        <input type="password" name="password" class="login_pass" placeholder=" کلمه عبور"  required="required"/>
                    </div>
                    <div>
                        <input type="submit" value="ورود به سیستم"/>
                    </div>
                    </form>
                    <?php
                        //$type=$_GET["type"];
                        if(isset($_GET["type"]) && $_GET["type"]=="error"){
                            echo '<div class="red">
کاربری با این مشخصات پیدا نشد لطفا ثبت نام کنید
                           </div> ';
                        }
                        
                    ?>
                    <div><a href="ghavanin.php">
                            <input type="button" value="آیین نامه" style="background: #ffff99;"/>
                            </a>
                    </div>
                    <div class="hr"></div>
                    <div><a href="Register.php">
                            <input type="button" value="ثبت نام"/></a>
                    </div>
                </div>
                <div class="leftlogin">
                    
                </div>
            </div>
            <div class="footer">
                
            </div>
        </div>
    </body>
</html>
