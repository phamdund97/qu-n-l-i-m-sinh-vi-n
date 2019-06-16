
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="admin-panel/css/header.css" media="screen" >
<link rel="stylesheet" href="admin-panel/a.css" media="screen" >
<link rel="stylesheet" href="admin-panel/css/component.css" media="screen" >
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
        <label id="label" style="position: absolute;left: 300px;top: 40px;font-size: 20px;">View Your Results:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                               <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label"></label>
 <select name="class" class="form-contfrol" style="width:500px" id="default" required="required">
<option value="">Select Course</option>
<?php $sql = "SELECT * from hocki";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->mahk); ?>"><?php echo htmlentities($result->tenhk); ?>&nbsp;
<?php }} ?>
 </select>
</div>

    
                                    <div class="form-group mt-50" style="position: absolute;left: -390px; top: 60px;">
                                        <div class="">
                                      
                                            <input type="submit" value="Request" class="btn btn-success btn-labeled pull-cente" style="position: relative;left: 650px">
                                        </div>
                                    </div>
</form>
<div style="position: absolute;top: 200px;left: 50px;">
<?php
// code Student Data
$stid=$_SESSION['alogin'];
$_SESSION['stid']=$stid;
$hk=$_POST['class'];

$qery = "SELECT stname from hsinh where stid=:id  ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':id',$stid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   
    }
    }?>
<p><b>Student Name :</b> <?php echo htmlentities($row->stname);?></p>
<p><b>Student Roll Id :</b> <?php echo $stid;?></p>
<p><b>Results of course:</b> 
    <?
    $qeri = "SELECT * from hocki where mahk=:id  ";
$st = $dbh->prepare($qeri);
$st->bindParam(':id',$hk,PDO::PARAM_STR);
$st->execute();
$res=$st->fetchAll(PDO::FETCH_OBJ);
if($st->rowCount() > 0)
{
foreach($res as $ro)
{   
    echo htmlentities($ro->tenhk);
    }
    }
    ?>
</p>

                                            </div>
                                            <div class="panel-body p-20" style="position: absolute;top: 300px;left: 30px;width:800px;">







                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>    
                                                            <th>Midterm</th>
                                                            <th>Final</th>
                                                            <th>Average</th>
                                                        </tr>
                                               </thead>
  


                                                    
                                                    <tbody>
<?php                                              
// Code for result
 $query ="SELECT diem.stid, diem.mahk,diem.scode, diem.midterm,diem.final, diem.mark, monhoc.sname from diem join monhoc on diem.scode=monhoc.scode  where diem.stid=:stid and diem.mahk=:hkid";
$query= $dbh -> prepare($query);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->bindParam(':hkid',$hk,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){


?>

    <tr>
        <th scope="row"><?php echo htmlentities($cnt);?></th>
        <td><?php echo htmlentities($result->sname);?></td>
        <td><?php echo htmlentities($totalmarks=$result->midterm);?></td>
        <td><?php echo htmlentities($totalmarks=$result->final);?></td>
        <td><?php echo htmlentities($totalmarks=$result->mark);?></td>
    </tr>
<?php 
$cnt++;}}
?>



                                                    </tbody>
                                                </table>
















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

