<?php
session_start();
error_reporting(0);
include('./config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
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
        background: gray;
    }
    .form-control {
        min-height: 41px;
        background: #f2f2f2;
        box-shadow: none !important;
        border: transparent;
    }
    .form-control:focus {
        background: #e2e2e2;
    }
    .form-control, .btn {        
        border-radius: 2px;
    }
    .login-form {
        position: relative;
        top: 100px;
        width: 350px;
        left: 30px;
        margin: 30px auto;
        text-align: center;
    }
    .login-form h2 {
        margin: 10px 0 25px;
    }
    .login-form form {
        color: #7a7a7a;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form .btn {        
        font-size: 16px;
        font-weight: bold;
        background: #3598dc;
        border: none;
        outline: none !important;
    }
    .login-form .btn:hover, .login-form .btn:focus {
        background: #2389cd;
    }
    .login-form a {
        color: #fff;
        text-decoration: underline;
    }
    .login-form a:hover {
        text-decoration: none;
    }
    .login-form form a {
        color: #7a7a7a;
        text-decoration: none;
    }
    .login-form form a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div style="position: relative;background-color: blue;height: 60px;width:70%;left: 200px;top: 70px;-moz-border-radius: 10px;-webkit-border-radius: 10px;">
        <label style="position: relative;top: 15px;left: 300px; font-weight: bold; font-size: 20px;text-align: center;">Result Management System</label> 
    </div>
<div class="login-form">
    <form  method="post">
        <h2 class="text-center">Login</h2>   
        <div class="form-group has-error">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <input type="submit" name="login" value="Log in" class="btn btn-primary btn-lg btn-block">
        </div>
    </form>
</div>
</body>
</html>                            
