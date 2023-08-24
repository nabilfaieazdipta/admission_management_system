<?php
session_start();
   if(!isset($_SESSION['username']))
   {
      header("location:login.php");
   }
   elseif($_SESSION['usertype']=='admin')
   {
      header("location:login.php");
   }
   elseif($_SESSION['usertype']=='student')
   {
    header("location:login.php");
   }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Teacher Dashboard </title>

	<link rel="stylesheet" type="text/css" href="admin.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

 


	<header class="header">
		
		<a href="teacher_profile.php"> <b>Teacher Dashboard</b></a>

		<div class="logout">
			
			<a href=" login.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside>
		
		<ul>
            <li>
				<a href="admission_applicant_teacher.php">Admission Form</a>
			</li>
            <li>
				<a href="teacher_view_student.php">Students</a>
			</li>
			<li>
				<a href="view_courses_teacher.php">Courses</a>
			</li>
            <li>
				<a href="teacher_view_teacher_list.php">Teacher List</a>
			</li>
            <li>
				<a href="">Notice</a>
			</li>
            
			


		</ul>


	</aside>







    
    <div class="content">
        <center>
        <h1> Teacher Dashboard</h1>
    </center>
    </div>
</body>
</html>