<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $q_string=$_GET["det"];
        echo '
             <embed src="upload/' . $q_string . '" width="1350" height="550"/>
';
        ?>
       
        <div >
            <a href="User_Account.php?model=Courses">
                <input type="button" value="بازگشت"/>
            </a>
        </div>
    </body>
</html>
