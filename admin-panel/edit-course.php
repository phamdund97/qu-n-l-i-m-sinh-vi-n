<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['edit']))
{
$oldid=$_POST['oldhk'];
$newhk=$_POST['newhk'];
$sql ="SELECT tenhk,mahk FROM hocki";
$query= $dbh -> prepare($sql);
$query-> bindParam(':id', $oldhk, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0 && $_POST['newhk'] != NULL)
{
$con="update hocki set tenhk=:newhk where mahk=:oldhk";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':oldhk', $oldid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newhk', $newhk, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Course succesfully added";
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
        <label id="label" style="position: absolute;top: 100px;">Please choose a course:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                               <tr>
                                   <td>
                                     <select name="oldhk" class="form-control" id="default" required="required" style="position: relative;top: 30px;width:250px;left:50px;">
                                                    <option value="">Select sourse name</option>
                                                    <?php $sql = "SELECT * from hocki";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>
                                                    <option value="<?php echo htmlentities($result->mahk); ?>"><?php echo htmlentities($result->tenhk); ?></option>
                                                    <?php }} ?>
                                                     </select>
                                   </td>
                                   <td>
                                        <label style="position: absolute;left: 50px;top: 80px;color: black;">Please enter new name course:</br>(Example: học kì 1 - năm nhất...etc)</label>
                                    </td>
                                   <td>
                                       <input type="text" name="newhk" size="25" style="position: relative;left: 50px; top: 100px;-moz-border-radius: 10px;
                                            -webkit-border-radius: 10px; width:270px;">
                                   </td>
                                
                                   <td>
                                       <input type="submit" value="Edit" name="edit" style="position: absolute;left: 170px;top: 200px;-moz-border-radius: 10px;
                                            -webkit-border-radius: 10px;">
                                   </td>
                               </tr> 
                            </form>  
        </div>
    </div>
</body>
</html>     
<? } ?>

