<?php
$allowedExts = array("pdf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["type"] == "application/pdf")
&& in_array($extension, $allowedExts)){
    if ($_FILES["file"]["error"] > 0){
       // echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        header("location: Admin_account.php?ac=ayin&error=true");
    }else{
        //echo "Upload: " . $_FILES["file"]["name"] . "<br>";application/pdf
        //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        $name_file=$_POST["types"].".pdf";
        //if (file_exists("upload/" . $_FILES["file"]["name"])){
        //    echo $_FILES["file"]["name"] . " already exists. ";
       // }else{
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "upload/" . $name_file);
            //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            header("location: Admin_account.php?action=successful");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        //}
    }
}else{
    header("location: Admin_account.php?ac=ayin&error=true");
}
  /*  $uploaddir='upload/';
    $new_name=$_GET["ac"].".pdf"; 
 $uploadfile=$uploaddir . basename($_FILES['file']['name']);
 if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
{ 
     if (substr(basename($_FILES['file']['name']), -4) != ".pdf") {
         header("location: Admin_account.php?ac=ayin&error=true");
     }
 else {
         header("location: Admin_account.php?action=successful");
     }
} 
else
    header("location: Admin_account.php?ac=ayin&error=true");*/
?>
