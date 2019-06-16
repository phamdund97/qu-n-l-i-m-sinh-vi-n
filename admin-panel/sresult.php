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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Results</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('./topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('./leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Results List</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="admindashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="manage-result.php"><i class="fa fa-home"></i>Manage - student results</a></li>
                                        <li class="active">Results List</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div cclass="col-md-12">
                                        <div class="panel" style="height: 700px;">
                                            <div class="panel-heading">
                                                <div class="panel-title">

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
<p style="color: red;"><b style="color: black;">Results of class :</b> <?php echo htmlentities($row->tenlop);?></p>
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
<p style="color: red;position: relative;top: -20px;"><b style="color: black;">In course :</b> <?php echo htmlentities($roww->tenhk);?></p>


                                            </div>
                                            <div style="position: relative;top: -30px;left: 4px; font-weight: bold;color: black;">
                                                <table>
                                                    <tr>
                <td>Add Student Results:</td>
                <td><a href="add-result.php"><i class="fa fa-user-plus" title="Add new student"></i> </a></td>
            </tr>
                                                </table>
                                            </div>
                                            <div class="panel-body p-20" style="position: relative;top: -20px;">







                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Student Name</th>
                                                            <th>Student ID</th>
                                                            <th>Subject</th>
                                                            <th>midterm</th>
                                                            <th>final</th>
                                                            <th>Average mark</th>
                                                            <th>Update Results</th>
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

    <tr>
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



                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /zpanel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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