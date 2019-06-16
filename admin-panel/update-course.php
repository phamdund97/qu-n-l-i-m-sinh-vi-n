<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['add']))
{
$newname=$_POST['name'];
$newcode=$_POST['code'];
$sql ="SELECT tenhk,mahk FROM hocki";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0 && $_POST['name'] != NULL)
{
$con="INSERT INTO hocki(tenhk,mahk) value (:newname,:newcode)";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':newcode', $newcode, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newname', $newname, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your info succesfully changed";
}
else{
    $error="Something wrong! please enter valid information";
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
        <div style="position: relative;left: 90px;">
        <label id="label">Add new course:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                               <tr>
                                
                                    <td>
                                        <label style="position: absolute;left: 35px;top: 20px;color: black;">Please enter new name course:</br>(Example: kì 1 - 2018-2019...etc)</label>
                                    </td>
                                   <td>
                                       <input type="text" name="name" size="25" style="position: absolute;left: 35px; top: 80px;-moz-border-radius: 10px;
                                            -webkit-border-radius: 10px; width:270px;">
                                   </td>
                                   <td>
                                        <label style="position: absolute;left: 35px;top: 110px;color: black;">Please enter new code course:</br>(Example: 1,2,3,4...etc)</label>
                                    </td>
                                   <td>
                                       <input type="text" name="code" size="25" style="position: relative;left: 35px; top: 170px;-moz-border-radius: 10px;
                                            -webkit-border-radius: 10px; width:270px;">
                                   </td>
                                   <td>
                                       <?
                                       $qery = "SELECT  * from hocki where mahk=(SELECT MAX(mahk) FROM hocki)";
                                        $stmt = $dbh->prepare($qery);
                                        $stmt->execute();
                                        $resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($stmt->rowCount() > 0)
                                        {
                                        foreach($resultss as $row)
                                        { 

                                        }
                                        }
                                       
                                       ?>
                                       <label style="position: absolute;left: 35px;top: 210px;color: red;"><? echo "Hiện tại mã học kì đang đạt đến:"."  ".htmlentities($row->mahk);echo "</br>";echo "và có tên học kì là:"." ".htmlentities($row->tenhk);?></label>

                                   </td>
                                   <td>
                                       <input type="submit" value="Add" name="add" style="position: absolute;left: 145px;top: 270px;-moz-border-radius: 10px;
                                            -webkit-border-radius: 10px;">
                                   </td>
                               </tr> 
                            </form>
                        </div>




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
        
    </body>
</html>
<? } ?>

