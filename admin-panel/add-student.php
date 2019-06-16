<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$studentname=$_POST['fullanme'];
$stid=$_POST['stid'];
$pass=md5($_POST['stid']); 
$studentemail=$_POST['email']; 
$gender=$_POST['gender']; 
$classid=$_POST['class']; 
$dob=$_POST['dob']; 
$status=1;
$sql="INSERT INTO  hsinh(stid,stname,email,password,gender,classid,birthday,tinhtrang) VALUES(:roolid,:studentname,:studentemail,:pass,:gender,:classid,:dob,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':roolid',$stid,PDO::PARAM_STR);
$query->bindParam(':pass',$pass,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Student info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
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
        <label id="label">Add New Students:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">

<div class="form-group" style="position: absolute;left: -70px;">
<label for="default" class="col-sm-4 control-label">Full Name</label>
<div class="col-sm-10" >
<input type="text" name="fullanme" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>

<div class="form-group" style="position: absolute;left: -70px; top: 70px;">
<label for="default" class="col-sm-6 control-label">Student Id</label>
<div class="col-sm-10">
<input type="text" name="stid" class="form-control" id="rollid" maxlength="5" required="required" autocomplete="off">
</div>
</div>

<div class="form-group" style="position: absolute;left: 300px;">
<label for="default" class="col-sm-6 control-label">Email</label>
<div class="col-sm-10" style="width:250px;">
<input type="email" name="email" class="form-control" id="email" required="required" autocomplete="off">
</div>
</div>



<div class="form-group" style="position: absolute;left: -70px; top: 140px;">
<label for="default" class="col-sm-6 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="male" required="required" checked="">Male <input type="radio" name="gender" value="female" required="required">Female <input type="radio" name="gender" value="other" required="required">Other
</div>
</div>










                                                    <div class="form-group" style="position: absolute;left: 300px;top: 70px; ">
                                                        <label for="default" class="col-sm-6 control-label">Class</label>
                                                        <div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required" style="width:220px;">
<option value="">Select Class</option>
<?php $sql = "SELECT * from lop";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->malop); ?>"><?php echo htmlentities($result->tenlop); ?>&nbsp; </option>
<?php }} ?>
 </select>
                                                        </div>
                                                    </div>
<div class="form-group" style="position: absolute;left: 300px; top: 140px;">
                                                        <label for="date" class="col-sm-6 control-label">Birthday</label>
                                                        <div class="col-sm-10">
                                                            <input type="date"  name="dob" class="form-control" id="date">
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group" style="position: absolute;left: 150px; top: 250px;">
                                                        <div class="col-sm-offset-2 col-sm-10" style="text-align: center;">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
                                                        </div>
                                                    </div>
                          </form>  
        </div>
    </div>
</body>
</html> 
<?PHP } ?>
