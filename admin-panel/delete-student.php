<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: student.php"); 
    }
    else{
$stid=intval($_GET['id']);
$con ="DELETE FROM hsinh WHERE stid = :id";
$chng = $dbh->prepare($con);
$chng-> bindParam(':id', $stid, PDO::PARAM_STR);
$chng->execute();
echo "<script>alert('Delete successfully');</script>";
echo "<script type='text/javascript'> document.location = 'manage-student.php'; </script>";
}
?>