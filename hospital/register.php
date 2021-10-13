<?php
require_once '../connection.php';
if(isset($_POST['submit'])){
$type = $_POST['type'];
$nationalId = $_POST['nationalId'];
$uname = $_POST['uname'];
$dateofdeath = $_POST['dateofdeath'];
$gender = $_POST['gender'];
$workingplace = $_POST['workingplace'];
$workingname= $_POST['workingname'];
$governorates = $_POST['governorates'];
$question = $_POST['question'];
$questiond = $_POST['questiond'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
$gov = $_POST['governorate'];
$date = date("Y/m/d");
$follow = $_POST['follow'];
    $hospital =$_POST['hospital'];
$filecert = $_FILES['cert'];
$fileNamecert = $_FILES['cert']['name'];
$fileTemNamecert = $_FILES['cert']['tmp_name'];
$fileSizecert = $_FILES['cert']['size'];
$fileErrorcert = $_FILES['cert']['error'];
$fileTypecert = $_FILES['cert']['type'];
$fileExtcert = explode('.', $fileNamecert);
$fileActualExtcert = strtolower(end($fileExtcert));
$allowedcert = array ('jpg','jpeg','png');
   if(in_array($fileActualExtcert, $allowedcert)){
     if($fileErrorcert === 0){
        if($fileSizecert < 1000000){
            $fileNameNewcert = uniqid('',true).".".$fileActualExtcert;
            $fileDestinationcert = '../attach/'.$fileNameNewcert;
            move_uploaded_file($fileTemNamecert, $fileDestinationcert);
             
            
                 }
            else {
                echo "size error!!";
                }
            } 
        else{
            echo "there was an error to upload img";
            }
        }
    else {
        echo "Error to upload!!";
        }

        $filereport = $_FILES['report'];
        $fileNamereport = $_FILES['report']['name'];
        $fileTemNamereport = $_FILES['report']['tmp_name'];
        $fileSizereport = $_FILES['report']['size'];
        $fileErrorreport = $_FILES['report']['error'];
        $fileTypereport = $_FILES['report']['type'];
        $fileExtreport = explode('.', $fileNamereport);
        $fileActualExtreport = strtolower(end($fileExtreport));
        $allowedreport = array ('jpg','jpeg','png','pdf');
        if(in_array($fileActualExtreport, $allowedreport)){
            if($fileErrorreport === 0){
                if($fileSizereport < 1000000){
                    $fileNameNewreport = uniqid('',true).".".$fileActualExtreport;
                    $fileDestinationreport = '../attach/'.$fileNameNewreport;
                    move_uploaded_file($fileTemNamereport, $fileDestinationreport);
                   
                }
                else {
                    echo "size error!!";
                }
            } 
            else{
                echo "there was an error to upload img";
            }
        }
        else {
            echo "Error to upload!!";
        }
    
    
    
       
              $filetests = $_FILES['tests'];
        $fileNametests = $_FILES['tests']['name'];
        $fileTemNametests = $_FILES['tests']['tmp_name'];
        $fileSizetests = $_FILES['tests']['size'];
        $fileErrortests = $_FILES['tests']['error'];
        $fileTypetests = $_FILES['tests']['type'];
        $fileExttests = explode('.', $fileNametests);
        $fileActualExttests = strtolower(end($fileExttests));
        $allowedtests = array ('jpg','jpeg','png','pdf');
        if(in_array($fileActualExttests, $allowedtests)){
            if($fileErrortests === 0){
                if($fileSizetests < 1000000){
                    $fileNameNewtests = uniqid('',true).".".$fileActualExttests;
                    $fileDestinationtests = '../attach/'.$fileNameNewtests;
                    move_uploaded_file($fileTemNametests, $fileDestinationtests);
                   
                }
                else {
                    echo "size error!!";
                }
            } 
            else{
                echo "there was an error to upload img";
            }
        }
        else {
            echo "Error to upload!!";
        }
    
    
    
    
              $filemedradio = $_FILES['medradio'];
        $fileNamemedradio = $_FILES['medradio']['name'];
        $fileTemNamemedradio = $_FILES['medradio']['tmp_name'];
        $fileSizemedradio = $_FILES['medradio']['size'];
        $fileErrormedradio = $_FILES['medradio']['error'];
        $fileTypemedradio = $_FILES['medradio']['type'];
        $fileExtmedradio = explode('.', $fileNamemedradio);
        $fileActualExtmedradio = strtolower(end($fileExtmedradio));
        $allowedmedradio = array ('jpg','jpeg','png','pdf');
        if(in_array($fileActualExtmedradio, $allowedmedradio)){
            if($fileErrormedradio === 0){
                if($fileSizemedradio < 1000000){
                    $fileNameNewmedradio= uniqid('',true).".".$fileActualExtmedradio;
                    $fileDestinationmedradio= '../attach/'.$fileNameNewmedradio;
                    move_uploaded_file($fileTemNamemedradio, $fileDestinationmedradio);

                }
                else {
                    echo "size error!!";
                }
            } 
            else{
                echo "there was an error to upload img";
            }
        }
        else {
            echo "Error to upload!!";
        }
    
    
    
    
         
          

$ins = "INSERT INTO deathinfo (type,nationalId,uname,dateofdeath,gender,workingplace,workingname,governorates,question,questiond,address,phone,landnum,cert,report,tests,medradio,status,governorate,follow,hospital,date) VALUES ('$type','$nationalId','$uname','$dateofdeath','$gender','$workingplace','$workingname','$governorates','$question','$questiond','$address','$phone','$mobile' ,'$fileDestinationcert','$fileDestinationreport','$fileDestinationtests','$fileDestinationmedradio','مديرية','$gov','$follow','$hospital','$date')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
 echo '<script type="text/javascript">';
     echo ' alert("تم التسجيل بنجاح");';
    echo '</script>';
 echo '<script type="text/javascript">';echo'window.location.href="Hform.php";';echo '</script>';
}
else {
    echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التسجيل");';
    echo '</script>';
    echo '<script type="text/javascript">';echo'window.location.href="Hform.php";';echo '</script>';
}   
}
?>