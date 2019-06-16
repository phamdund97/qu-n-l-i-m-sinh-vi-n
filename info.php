
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
$stid=$_SESSION['alogin'];
$_POST['stid']=$stid;
if(isset($_POST['ok'])){
$newname=$_POST['name'];
$newmail=$_POST['mail'];
$newgender=$_POST['gender'];
$sql ="SELECT email,gender,stname FROM hsinh WHERE stid=:id";
$query= $dbh -> prepare($sql);
$query-> bindParam(':id', $stid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update hsinh set stname=:newname, email=:newmail, gender=:newgender where stid=:id";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':id', $stid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newname', $newname, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newmail', $newmail, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newgender', $newgender, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your info succesfully changed";
}
else {
$error="Something wrong! please enter valid information";    
}
    }

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
        <label id="label" style="position: absolute;left: 300px;top: 40px;font-size: 20px;">View Your Information:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">



                                            



<!-- chưa hoàn thành -->
<?php 
$rollid=$_SESSION['alogin'];
$_SESSION['rollid']=$rollid;
$qery = "SELECT   hsinh.stid,hsinh.stname, hsinh.email,hsinh.gender,lop.tenlop,hsinh.khoahoc from hsinh join lop on hsinh.classid=lop.malop where hsinh.stid=:rollid";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
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
    
   
    <div class="col-md-3" style="width:450px;height: 400px; position: absolute; top: -70px;left: -210px;">
        <tr>
            <td>
                <label style="float:left;position: absolute;left: 150px;top: 100px;">Full Name:</label>
            </td>
            <td>
                <input type="text" value="<?echo htmlentities($row->stname);?>" name="name" style="-moz-border-radius: 10px;
-webkit-border-radius: 10px; position: absolute;left: 250px;top: 100px;"></input>
            </td>
            <td>
                <label style="position: absolute;left: 180px;top: 170px;">Gmail:</label>
            </td>
            <td>
                <input type="text" value="<?echo htmlentities($row->email);?>" name="mail" style="-moz-border-radius: 10px;
-webkit-border-radius: 10px; position: absolute;left: 250px;top: 170px;"></input>
            </td>
            <td>
                <label style="position: absolute;left: 170px;top: 230px;">Gender:</label>
            </td>
            <td>
                <input type="text" value="<?echo htmlentities($row->gender);?>" name="gender" style="-moz-border-radius: 10px;
-webkit-border-radius: 10px; position: absolute;left: 250px;top: 230px;"></input>
            </td>
        
        </tr>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6" style=" position: absolute;top: -75px; ;left: 240px;height: 400px;width:450px;">
        <tr>
            <td>
                <label style="position: absolute;top: 105px;">Student ID:</label>
            </td>
            <td>
                <label style="color: red;position: absolute;top: 105px;left: 150px;"><?echo htmlentities($row->stid);?></label>
            </td>
            <td>
                <label style="position: absolute;top: 175px;">Class:</label>
            </td>
            <td>
                <label style="color: red;position: absolute;top: 175px;left: 150px;"><?echo htmlentities($row->tenlop);?></label>
                </td>
                <td>
                <label style="position: absolute;top: 238px;">Course time:</label>
            </td>
            <td>
                <label style="color: red;position: absolute;top: 240px;left: 150px;"><?echo htmlentities($row->khoahoc);?></label>
                </td>
        </tr>
        <input type="submit" name="ok" value="Change" style="-moz-border-radius: 10px;
-webkit-border-radius: 15px;background-color: #F0FFFF;position: absolute;top: 300px;left:70px;font-weight:bold">
    </div>
</form>

    </tbody>



                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
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
        
    </body>
</html>
<?php } ?>

