
<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/header.css" media="screen" >
<link rel="stylesheet" href="./a.css" media="screen" >
<link rel="stylesheet" href="css/component.css" media="screen" >
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Result Management System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css">
        .example{
            margin: 20px;
        }
    </style>
<style type="text/css">
    body {
        color: #fff;
        background: white;
    }
    
</style>
</head>
<body class="body">
    <div>
        <? include('./header.php'); ?>
    </div>
    <div class="main">
        <div class="aleart">
            <?php if($msg){
                echo htmlentities($msg); } 
                else if($error){
                echo htmlentities($error);} ?>
        </div>
        <div>
            <label id="label">Course Management:</label>
            <form  class="chng" method="post"  onSubmit="return valid();">
                <table class="table" style="width: 700px;position: absolute;left: -100px;top: 30px;border: 2px solid gray;">
                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">#</th>
                                                            <th style="text-align: center;">Course Name</th>
                                                            <th style="text-align: center;">Course ID</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    
                
                                        


<!-- chưa hoàn thành -->
<?php 
$sql = "SELECT * from hocki";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{ ?>

    <tr style="text-align: center;">
        <td><?php echo htmlentities($cnt);?></td>
        <td><?echo htmlentities($row->tenhk);?></td>
        <td><?echo htmlentities($row->mahk);?></td>
        
    </tr>

    <!-- trời ơi thiêú mất chỗ này làm mình fix lôix gần chết!! --->
    <?php $cnt=$cnt+1;}} ?>
    
    </tbody>
</table>
                                        </form>  
        </div>
    </div>
</body>
</html>     
<?php } ?>