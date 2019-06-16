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
if(isset($_POST['submit']))
    {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
    $sql ="SELECT password FROM hsinh WHERE stid=:id and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':id', $stid, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update hsinh set password=:newpassword where stid=:id";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':id', $stid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";    
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
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Current Password</label>
                                                		<div class="">
                                    <input type="password" name="password" class="form-control" required="required" id="success">
                                                      
                                                		</div>
                                                	</div>
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">New Password</label>
                                                        <div class="">
                                                            <input type="password" name="newpassword" required="required" class="form-control" id="success">
                                                        </div>
                                                    </div>
                                                     <div class="form-group has-success">
                                                        <label for="success" class="control-label">Confirm Password</label>
                                                        <div class="">
                                                            <input type="password" name="confirmpassword" class="form-control" required="required" id="success">
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Change<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
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
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
