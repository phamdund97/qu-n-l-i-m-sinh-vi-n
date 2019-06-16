<div style="position: relative;background-color: #E6E9EB;color: black;font-family: sans-serif;border: 1px solid #CDD0D3;height: 100px;">
		<label style="position: absolute;top: 15px;left: 20px; ;font-weight: bold;font-family: Florence, cursive; font-size: 35px;">Results Management System</label> 
        <label style="position: absolute;top: 10px;font-family: serif;font-size: 19px;left: 1000px;color: #201D90;">Hello, admin </label>
        <a href="change-password.php" style="position: relative;left: 990px;top: 77px; font-size: 15px;" class="fa fa-spinner">Change Password</a>
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
                  <a href="dashboard.php">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a><i class="glyphicon glyphicon-th fa-lg"></i> Manage Course <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="manage-course.php">View All Course</a></li>
                    <li><a href="edit-course.php">Edit Course</a></li>
                    <li><a href="update-course.php">Add Course</a></li>
                  
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a><i class="glyphicon glyphicon-list-alt fa-lg"></i> Manage Subject <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li><a href="manage-subject.php">View All Subject</a></li>
                  <li><a href="edit-subject.php">Edit Subject</a></li>
                  <li><a href="add-subject.php">Add New Subject</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a ><i class="fa fa-group fa-lg"></i> Manage Students <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li><a href="manage-student.php">View Student with Class</a></li>
                 
                  <li><a href="add-student.php">Add New Students</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#xx" class="collapsed">
                  <a href="#"><i class="glyphicon glyphicon-education fa-lg"></i> Manage Results <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="xx">
                  <li><a href="manage-result.php">View All Results</a></li>
                  <li><a href="add-result.php">Add new Results</a></li>
                </ul>


                 
            </ul>
     </div>
</div>
		</div>
	</div>