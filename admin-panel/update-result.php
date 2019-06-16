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
$midterm=$_POST['midterm']; 
$final=$_POST['final']; 
$mark=$_POST['mark'];
$subject=$_POST['subject'];  
$sql="update diem set midterm=:mid,final=:final,mark=:mark where stid=:stid and scode=:subject ";
$query = $dbh->prepare($sql);
$query->bindParam(':mid',$midterm,PDO::PARAM_STR);
$query->bindParam(':final',$final,PDO::PARAM_STR);
$query->bindParam(':mark',$mark,PDO::PARAM_STR);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->execute();

$msg="Student result updated successfully";
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
        <label id="label">Update Result Student:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
<?php 

$sql = "SELECT hsinh.stname, diem.stid from diem join hsinh on hsinh.stid = diem.stid where diem.stid=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  }}?>


<div class="form-group">
<label for="default" class="col-sm-6 control-label">Full Name :</label>
<div class="col-sm-10">
<label style="position: absolute;top: -25px;left: 110px;"><?php echo htmlentities($result->stname)?></label> 
</div>
</div>

<div class="form-group" style="position: absolute;left: 250px;top: 0px;">
<label for="default" class="col-sm-8 control-label">Student Id :</label>
<div class="col-sm-10">
<label style="position: relative;top: -25px;left: 90px;"> <?php echo htmlentities($result->stid)?></label> 
</div>
</div>
<label style="position: absolute;left: 15px;top:35px;">Choose a subject:</label>
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
               <input type="text" name="midterm" value="<? echo htmlentities($result->midterm);?>" size="30" style="position: absolute;left: -55px;width:300px;border-radius: 10px; top: 13px;">
            </td>
        </tr>
        <tr>
            <td>
                <label style="float:left;position: absolute;left: -185px;top: 65px;">Final Mark:</label>
            </td>
            <td>
                <input type="text" name="final" size="30" style="position: absolute;left: -55px;width:300px;border-radius: 10px; top: 63px;">
            </td>
        </tr>
         <tr>
            <td>
                <label style="float:left;position: absolute;left: -185px;top: 115px;">Average Mark:</label>
            </td>
            <td>
                <input type="text" name="mark" size="30" style="position: absolute;left: -55px;width:300px;border-radius: 10px; top: 113px;">
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
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
