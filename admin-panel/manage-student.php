
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
        <label id="label">View Student with Class:</label>
          <form  class="chng" method="post" action="manage-student.php" onSubmit="return valid();">
                               <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="class" class="form-contfrol" style="width:500px" id="default" required="required">
<option value="">Select Class:</option>
<?php $sql = "SELECT * from lop";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->malop); ?>"><?php echo htmlentities($result->tenlop); ?>&nbsp;
<?php }} ?>
 </select>
</div>

    
                                    <div class="form-group mt-50">
                                        <div class="">
                                      
                                            <input type="submit" name="ok" value="Search" class="btn btn-success btn-labeled pull-cente" style="position: absolute;left: 190px">
                                            
                                        </div>
                                    </div>
</form>  
        </div>

        <div style="position: absolute;top: 200px; background-color: white;width:100%;height: auto;">
<? $id=$_POST['class'];

$qery = "SELECT * from lop where malop=:id  ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':id',$id,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   
    }
    }?>
<p style="color: red;"><b style="color: black;">Results of class :</b> <?php echo htmlentities($row->tenlop);?></p>
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                        <tr>
                                                            <th style="text-align: center;">#</th>
                                                            <th style="text-align: center;">Student Name</th>
                                                            <th style="text-align: center;">Student ID</th>
                                                            <th style="text-align: center;">Email:</th>
                                                            <th style="text-align: center;">Gender</th>
                                                            <th style="text-align: center;">Course Time</th>
                                                            <th style="text-align: center;">Delete student</th>
                                                            
                                                        </tr>
                                               </thead>
  


                                                    
                                                    <tbody>
<?php                                              
// Code for result
 $query ="SELECT * from hsinh  where classid=:id";
$query= $dbh -> prepare($query);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){


?>

    <tr style="text-align: center;">
        <th scope="row"><?php echo htmlentities($cnt);?></th>
        <td><?php echo htmlentities($result->stname);?></td>
        <td><?php echo htmlentities($totalmarks=$result->stid);?></td>
        <td><?php echo htmlentities($totalmarks=$result->email);?></td>
        <td><?php echo htmlentities($totalmarks=$result->gender);?></td>
        <td><?php echo htmlentities($totalmarks=$result->khoahoc);?></td>
        <td style="text-align: center;">
        <a href="delete-student.php?id=<?php echo htmlentities($result->stid);?> "><i class="fa fa-close" style="position: relative;left: 10px;" title="Delete Student"></i> </a>
            
        </a>
        </td>
        
    </tr>
<?php 
$cnt++;}}
?>



                                                    </tbody>
                                                </table>
        </div>
    </div>
</body>
</html>     
<?php } ?>

