<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: admindashboard.php"); 
    }
    else{
    if(isset($_POST['ok']))
{
$oldsub=$_POST['old'];
$newsub=$_POST['new'];
$sql ="SELECT sname,scode FROM monhoc";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0 && $_POST['new'] != NULL)
{
$con="update monhoc set sname=:new where scode=:old";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':old', $oldsub, PDO::PARAM_STR);
$chngpwd1-> bindParam(':new', $newsub, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Subject succesfully edited";
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
        <label id="label">Edit Subject Imediately:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                                            
                                                     <select name="old" class="form-control" id="default" required="required" style="position: absolute;top: 10px; width: 50%;left: 40px;">
                                                    <option value="">Select Subject</option>
                                                    <?php $sql = "SELECT * from monhoc";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>
                                                    <option value="<?php echo htmlentities($result->scode); ?>"><?php echo htmlentities($result->sname); ?></option>
                                                    <?php }} ?>
                                                     </select>


                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label" style="position: absolute;top: 70px;width: 50%;left: 40px;">Rename subject:</label>
                                                        <div class="" style="position: relative;top: 100px;width: 50%;left: 40px;">
                                                            <input type="text" name="new" class="form-control" required="required" id="success">
                                                            <span class="help-block">Eg- Toán etc</span>
                                                        </div>

                                     

                                    <div class="">
                                        <input type="submit" name="ok" class="btn btn-success btn-labeled" style="position: absolute;left: 100px;height: 40px;top: 200px;">
                                    </div>

                                </form></div></form>


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
<? } ?>
