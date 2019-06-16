<div style="position: relative;background-color: #E6E9EB;color: black;font-family: sans-serif;border: 1px solid #CDD0D3;height: 100px;">
		<label style="position: absolute;top: 15px;left: 20px; ;font-weight: bold;font-family: Florence, cursive; font-size: 35px;">Results Management System</label> 
        <label style="position: absolute;top: 10px;font-family: serif;font-size: 19px;left: 1000px;color: #201D90;">
          <?php
                                    $stid=$_SESSION['alogin'];
                                    $_SESSION['stid']=$stid;
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
                                    <p style="color:#1B11F2"><b style="color: red">Welcome</b> <?php echo htmlentities($row->stname);?></p>
         </label>
        <a href="userchange-password.php" style="position: relative;left: 990px;top: 77px; font-size: 15px;" class="fa fa-spinner">Change Password</a>
        <a href="logout.php" style="position: relative;left: 1010px;top: 77px; font-size: 15px;" class="fa fa-sign-out">Log out</a>
	</div>
	
	<div style="background-color: #D3D7DA;width:20%;height: auto;position: relative;top: 20px;left: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;"> 
		
		<div>
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="nav-side-menu">
    <div class="brand">Menu</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="usersdashboard.php">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a><i class="glyphicon glyphicon-th fa-lg"></i> Student Information <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="info.php">View Your Information</a></li>
                  
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a><i class="glyphicon glyphicon-list-alt fa-lg"></i> Student Results <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li><a href="get-result.php">View Your Results with Course</a></li>
                </ul>


              
                

               
     </div>
</div>
		</div>
	</div>