<?php
// Include the database configuration file
include 'config.php';
session_start();
// File upload path
$targetDir = "C:\wamp64\www\Web-Design-master\Demo_Data";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowedTypes = "json";
    if( ($fileType) == $allowedTypes ){
        // Upload file to server
        $_SESSION["targetFilePath"] = $targetFilePath;
        header("location:json-parser.php");
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert json file name into database
            if($insert){
               echo  '<script>alert("The chosen file has been succesfully uploaded.");
               window.location.href="welcome.php";
               </script>';
            }else{
               echo  '<script>alert( "File upload failed, please try again.")
               window.location.href="welcome.php";
               </script>';
            } 
        }else{
           echo '<script>alert("Error during file upload."); window.location.href="welcome.php";</script>';
        }
    }else{
       echo  '<script>alert("Sorry only JSON files are to be uploaded!"); window.location.href="welcome.php";</script>';
    }
}else{
   echo  '<script>alert("Please select a file to upload");
   window.location.href="welcome.php";
   </script>';
}
?>