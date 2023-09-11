<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



/*include 'send_mail.php';
$email=new send_mail($_GET["sender_mail"]);
$email->addrecipient("info@yu.ac.ir");
$email->setbody(" Name : jamal <br /> email : ".$_GET["sender_mail"]."<br /> message : <br />".$_GET["message"]."");
$email->setsubject("تماس ");
$email->sendmail();*/

if(!empty($_GET["sender_name"]) && !empty($_GET["sender_mail"]) && !empty($_GET["message"])){
    $con = @mysqli_connect("localhost", "root", "", "db_uni_portal");
    if (!mysqli_connect_error()) {
        $query_reg = "insert into tbl_relate (sender_name,sender_mail,message) values (N'" . $_GET["sender_name"] . "',N'" . $_GET["sender_mail"] . "',N'" . $_GET["message"] . "')";
        mysqli_query($con, $query_reg);
        mysqli_close($con);
        header("location: Connect-us.php?message=send");
    }
}
?>
