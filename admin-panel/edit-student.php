<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

$stid=intval($_GET['id']);

if(isset($_POST['submit']))
{
$studentname=$_POST['name'];
$roolid=$_POST['stid']; 
$studentemail=$_POST['email']; 
$gender=$_POST['gender']; 
$classid=$_POST['class']; 
$dob=$_POST['dob']; 
$status=$_POST['status'];
$sql="update hsinh set stname=:studentname,stid=:roolid,email=:studentemail,gender=:gender,birthday=:dob,tinhtrang=:status where stid=:stid ";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();

$msg="Student info updated successfully";
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
        <label id="label">Please fill all empty box:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
<?php 

$sql = "SELECT hsinh.stname,hsinh.birthday,hsinh.gender, hsinh.stid, hsinh.email, hsinh.gender, hsinh.khoahoc, hsinh.tinhtrang, lop.tenlop from hsdnh join lop on lop.malop = hsinh.classid where stid=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control" id="name" value="<?php echo htmlentities($result->stname)?>" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Student Id</label>
<div class="col-sm-10">
<input type="text" name="stid" class="form-control" id="stid" value="<?php echo htmlentities($result->stid)?>" maxlength="5" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" name="email" class="form-control" id="email" value="<?php echo htmlentities($result->email)?>" required="required" autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<?php  $gd=$result->gender;
if($gd=="male")
{
?>
<input type="radio" name="gender" value="male" required="required" checked>Male <input type="radio" name="gender" value="female" required="required">Female <input type="radio" name="gender" value="Other" required="required">other
<?php }?>
<?php  
if($gd=="female")
{
?>
<input type="radio" name="gender" value="male" required="required" >Male <input type="radio" name="gender" value="female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">other
<?php }?>
<?php  
if($gd=="other")
{
?>
<input type="radio" name="gender" value="male" required="required" >Male <input type="radio" name="gender" value="female" required="required">Female <input type="radio" name="gender" value="Other" required="required" checked>other
<?php }?>


</div>
</div>



                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Class</label>
                                                        <div class="col-sm-10">
<input type="text" name="classname" class="form-control" id="classname" value="<?php echo htmlentities($result->ClassName)?>(<?php echo htmlentities($result->tenlop)?>)" readonly>
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label">Birthday</label>
                                                        <div class="col-sm-10">
                <input type="date"  name="dob" class="form-control" value="<?php echo htmlentities($result->birthday)?>" id="date">
                                                        </div>
                                                    </div>


<div class="form-group">
<label for="default" class="col-sm-2 control-label">Status</label>
<div class="col-sm-10">
<?php  $tinhtrang=$result->tinhtrang;
if($tinhtrang=="1")
{
?>
<input type="radio" name="delete" value="1" required="required" checked>Active <input type="radio" name="status" value="0" required="required">Graduated 
<?php }?>
<?php  
if($tinhtrang=="0")
{
?>
<input type="radio" name="status" value="1" required="required" >Active <input type="radio" name="status" value="0" required="required" checked>Graduated 
<?php }?>




</div>
</div>

<?php }} ?>                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </div>
                                                </form>  
        </div>
    </div>
</body>
</html>     
<?php } ?>
