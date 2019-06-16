<?php
session_start();
error_reporting(0);
include('./config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
    if(isset($_POST['ok']))
        {
            $name=$_POST['name'];
            $id=$_POST['ID'];}
            $sql="INSERT INTO  monhoc(sname,scode) VALUES(:name,:id)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Subject update successfully";
}
else 
{
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
        <div>
        <label id="label">Add New Subject:</label>
          <form  class="chng" method="post"  onSubmit="return valid();">
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Add Name Subject:</label>
                                                        <div class="">
                                                            <input type="text" name="name" class="form-control" required="required" id="success">
                                                            <span class="help-block">Eg- Toán Cao Cấp etc</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Add ID Subject:</label>
                                                        <div class="">
                                                            <input type="text" name="ID" class="form-control" required="required" id="success">
                                                            <span class="help-block">Eg- MAT etc</span>
                                                        </div>
                                     </form>

                                    <div class="">
                                        <button type="submit" name="ok" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                    </div>




                            
        </div>
    </div>
</body>
</html>     



