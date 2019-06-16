
<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        $class=$_POST['class'];
    $course=$_POST['course'];

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
    <div class="main" style="background-color: white">
        <div class="aleart">
            <?php if($msg){
                echo htmlentities($msg); } 
                else if($error){
                echo htmlentities($error);} ?>
        </div>
        <div>
        <label id="label">View All Results of All Students:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                               <div class="form-group" style="position: relative;top: 20px;">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="class" class="form-contfrol" style="width:500px;position: absolute;top: -30px;left: -20px;" id="default" required="required">
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


<div style="position: relative;top: 40px;">
<label for="default" class="col-sm-2 control-label"></label>
 <select name="course" class="form-contfrol" style="width:500px;position: absolute;top: -30px;left: -20px;" id="default" required="required">
<option value="">Select Course:</option>
<?php $sql = "SELECT * from hocki";
$query = $dbh->prepare($sql);
$query->execute();
$kq=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($kq as $row)
{   ?>
<option value="<?php echo htmlentities($row->mahk); ?>"><?php echo htmlentities($row->tenhk); ?>&nbsp;
<?php }} ?>
 </select>
</div>

    
                                    <div class="form-group mt-50" style="position: relative;top: 40px;text-align: center;left: 80px;">
                                        <div class="">
                                      
                                            <button type="submit" class="btn btn-success btn-labeled pull-cente" >Search<span class="btn-label btn-label-right"><i class="fa fa-check" ></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

<div style="position: absolute;top: 100px; background-color: white;width:100%;height: auto;">
    <?php
$qery = "SELECT * from lop where malop=:id  ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':id',$class,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   
    }
    }?>
<p style="color: red;position: absolute;left: -150px;"><b style="color: black;">Results of class :</b> <?php echo htmlentities($row->tenlop);?></p>
<?php
$qeryy = "SELECT * from hocki where mahk=:id  ";
$st = $dbh->prepare($qeryy);
$st->bindParam(':id',$course,PDO::PARAM_STR);
$st->execute();
$res=$st->fetchAll(PDO::FETCH_OBJ);
if($st->rowCount() > 0)
{
foreach($res as $roww)
{   
    }
    }?>
<p style="color: red;position: absolute;top: 30px; left: -150px;"><b style="color: black;">In course :</b> <?php echo htmlentities($roww->tenhk);?></p>


                                            </div>
                                            
                                            <div class="panel-body p-20" style="position: relative;top: -20px;">







                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" style="position: absolute;top: 120px;width:800px;border: 1px solid gray;left: -150px;">
                                                <thead>
                                                        <tr>
                                                            <th style="text-align: center;">#</th>
                                                            <th style="text-align: center;">Student Name</th>
                                                            <th style="text-align: center;">Student ID</th>
                                                            <th style="text-align: center;">Subject</th>
                                                            <th style="text-align: center;">midterm</th>
                                                            <th style="text-align: center;">final</th>
                                                            <th style="text-align: center;">Average mark</th>
                                                            <th style="text-align: center;">Update Results</th>
                                                        </tr>
                                               </thead>
  


                                                    
                                                    <tbody>
<?php                                              
// Code for result
 $query ="SELECT diem.midterm, diem.final, diem.mark,hsinh.stname,hsinh.stid, monhoc.sname from diem inner join hsinh on diem.stid=hsinh.stid inner join monhoc on diem.scode = monhoc.scode where diem.lop=:malop and diem.mahk=:mahk ";
$query= $dbh -> prepare($query);
$query->bindParam(':malop',$class,PDO::PARAM_STR);
$query->bindParam(':mahk',$course,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount()>0)
{ 
foreach($results as $result){


?>

    <tr style="text-align: center;">
        <th scope="row"><?php echo htmlentities($cnt);?></th>
        <td><?php echo htmlentities($result->stname);?></td>
        <td><?php echo htmlentities($result->stid);?></td>
        <td><?php echo htmlentities($result->sname);?></td>
        <td><?php echo htmlentities($result->midterm);?></td>
        <td><?php echo htmlentities($result->final);?></td>
        <td><?php echo htmlentities($result->mark);?></td>
       
        <td style="text-align: center;">
        <a href="update-result.php?id=<?php echo htmlentities($result->stid);?>"><i class="fa fa-gears" style="position: relative;left: 10px;" title="Edit Student"></i> </a> 

        </td>
    </tr>
<?php 
$cnt++;}}
?>

</form>

                                                    </tbody>
                                                </table>

</div>














                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>
<?php } ?>

