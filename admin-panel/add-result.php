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
$midterm=$_POST['midterm']; 
$final=$_POST['final']; 
$mark=$_POST['mark'];
$id=$_POST['id'];
$class=$_POST['class'];
$subject=$_POST['subject']; 
$hk=$_POST['hk'];  
$sql="insert into diem(stid,mahk,scode,lop,midterm,final,mark) values (:stid,:hk,:subject,:class,:mid,:final,:mark)";
$query = $dbh->prepare($sql);
$query->bindParam(':mid',$midterm,PDO::PARAM_STR);
$query->bindParam(':final',$final,PDO::PARAM_STR);
$query->bindParam(':mark',$mark,PDO::PARAM_STR);
$query->bindParam(':stid',$id,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':class',$class,PDO::PARAM_STR);
$query->bindParam(':hk',$hk,PDO::PARAM_STR);
$query->execute();

$msg="Student result added successfully";
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
        <div class="aleart" style="position: absolute;top: 490px;">
            <?php if($msg){
                echo htmlentities($msg); } 
                else if($error){
                echo htmlentities($error);} ?>
        </div>
        <div>
        <label id="label">Add New Student Result:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                      


<div class="form-group">

<label style="position: absolute;left: 15px;top:5px;">Choose a Student ID:</label>
<div class="form-group" style="position: relative;top: 55px;left: 30px">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="id" class="form-contfrol" style="width:300px;position: relative;top: -50px;left: 113px;" id="default" required="required">
<option value="">Select A ID:</option>
<?php $sqla = "SELECT * from hsinh";
$queri = $dbh->prepare($sqla);
$queri->execute();
$resul=$queri->fetchAll(PDO::FETCH_OBJ);
if($queri->rowCount() > 0)
{
foreach($resul as $resut)
{ 
  ?>
<option value="<?php echo htmlentities($resut->stid); ?>"><?php echo htmlentities($resut->stid); ?>&nbsp; 
<?php }} ?>
 </select>
</div>


<label style="position: absolute;left: 15px;top:45px;">Choose a Class:</label>
<div class="form-group" style="position: relative;top: 55px;left: 30px">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="class" class="form-contfrol" style="width:300px;position: relative;top: -50px;left: 113px;" id="default" required="required">
<option value="">Select A Class:</option>
<?php $sqla = "SELECT * from lop";
$queri = $dbh->prepare($sqla);
$queri->execute();
$resul=$queri->fetchAll(PDO::FETCH_OBJ);
if($queri->rowCount() > 0)
{
foreach($resul as $resut)
{ 
  ?>
<option value="<?php echo htmlentities($resut->malop); ?>"><?php echo htmlentities($resut->tenlop); ?>&nbsp; 
<?php }} ?>
 </select>
</div>


<label style="position: absolute;left: 15px;top:75px;">Choose a subject:</label>
<div class="form-group" style="position: relative;top: 55px;left: 30px">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="subject" class="form-contfrol" style="width:300px;position: relative;top: -50px;left: 113px;" id="default" required="required">
<option value="">Select Subject:</option>
<?php $sql = "SELECT * from monhoc";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$a,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
$a=$result->scode;  ?>
<option value="<?php echo htmlentities($result->scode); ?>"><?php echo htmlentities($result->sname); ?>&nbsp; 
<?php }} ?>
 </select>
</div>

<label style="position: absolute;left: 15px;top:110px;">Choose a Course:</label>
<div class="form-group" style="position: relative;top: 55px;left: 30px">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="hk" class="form-contfrol" style="width:300px;position: relative;top: -50px;left: 113px;" id="default" required="required">
<option value="">Select A Course:</option>
<?php $sqla = "SELECT * from hocki";
$queri = $dbh->prepare($sqla);
$queri->execute();
$resul=$queri->fetchAll(PDO::FETCH_OBJ);
if($queri->rowCount() > 0)
{
foreach($resul as $resut)
{ 
  ?>
<option value="<?php echo htmlentities($resut->mahk); ?>"><?php echo htmlentities($resut->tenhk); ?>&nbsp; 
<?php }} ?>
 </select>
</div>
<? $sql = "SELECT * from diem where scode=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$a,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
    }}
?>
<div class="col-md-3" style="width:450px;height: 400px;position: relative;left: 200px;">
    <table>
        <tr>
            <td>
                <label style="float:left;position: absolute;left: -185px;top: 10px;">Midterm mark: </label>
            </td>
            <td>
               <input type="text" name="midterm" value="<? echo htmlentities($result->midterm);?>" size="30" style="position: absolute;left: 27px;width:300px;border-radius: 10px; top: 13px;">
            </td>
        </tr>
        <tr>
            <td>
                <label style="float:left;position: absolute;left: -185px;top: 65px;">Final Mark:</label>
            </td>
            <td>
                <input type="text" name="final" size="30" style="position: absolute;left: 27px;width:300px;border-radius: 10px; top: 63px;">
            </td>
        </tr>
         <tr>
            <td>
                <label style="float:left;position: absolute;left: -185px;top: 115px;">Average Mark:</label>
            </td>
            <td>
                <input type="text" name="mark" size="30" style="position: absolute;left: 27px;width:300px;border-radius: 10px; top: 113px;">
            </td>
        </tr>
    </div>
</table>



                                             

                                                    
                                                    <div class="form-group" style="position: absolute;text-align: center;top: 170px;">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                                    
                                                    </div>
                                                </form>  
        </div>
    </div>
</body>
</html>   
<? } ?>  